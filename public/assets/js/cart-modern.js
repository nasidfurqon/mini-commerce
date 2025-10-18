/* Cart Modern Interactions: qty spinner, subtotal updates, animated remove, totals */
(function(){
  const $ = (sel, ctx=document) => ctx.querySelector(sel);
  const $$ = (sel, ctx=document) => Array.from(ctx.querySelectorAll(sel));

  function parseMoney(text){
    const n = parseFloat(String(text).replace(/[^0-9.]/g, ''));
    return isNaN(n) ? 0 : n;
  }
  function formatMoney(n){
    return `$${n.toFixed(2)}`;
  }

  function recalcRowSubtotal(row){
    const priceEl = $('.product-price-cart .amount', row);
    const qtyInput = $('.cart-plus-minus-box', row);
    const subtotalEl = $('.product-subtotal', row);
    if(!priceEl || !qtyInput || !subtotalEl) return;
    const price = parseMoney(priceEl.textContent);
    const qty = Math.max(1, parseInt(qtyInput.value || '1', 10));
    qtyInput.value = qty;
    const subtotal = price * qty;
    subtotalEl.textContent = formatMoney(subtotal);
  }

  function recalcTotals(){
    const rows = $$('.cart-list .cart-item');
    const subtotals = rows.map(r => parseMoney($('.product-subtotal', r)?.textContent || 0));
    const totalProducts = subtotals.reduce((a,b)=>a+b,0);
    const totalProductsEl = $$('.grand-totall h5 span').find(el => /Total products/i.test(el.parentElement.textContent));
    if(totalProductsEl){ totalProductsEl.textContent = formatMoney(totalProducts); }

    // Shipping sum (checkboxes); sum all checked
    const shippingChecks = $$('.total-shipping input[type="checkbox"]');
    let shipping = 0;
    shippingChecks.forEach(ch => {
      if(ch.checked){
        const valText = ch.nextElementSibling?.textContent || ch.parentElement?.textContent || '';
        const match = valText.match(/\$[0-9]+(\.[0-9]{2})?/);
        shipping += match ? parseMoney(match[0]) : 0;
      }
    });

    const grandTotalEl = $('.grand-totall .grand-totall-title span');
    if(grandTotalEl){ grandTotalEl.textContent = formatMoney(totalProducts + shipping); }
  }

  function injectQtyButtons(container){
    if(container.dataset.enhanced === '1') return;

    // Remove any legacy controls injected by theme/plugin to avoid duplicates
    Array.from(container.querySelectorAll('.dec, .inc, .qtybutton')).forEach(n => n.remove());

    const input = $('.cart-plus-minus-box', container);
    if(!input) return;
    const minus = document.createElement('button');
    minus.className = 'qty-btn minus';
    minus.type = 'button';
    minus.setAttribute('aria-label','Decrease quantity');
    minus.textContent = '−';

    const plus = document.createElement('button');
    plus.className = 'qty-btn plus';
    plus.type = 'button';
    plus.setAttribute('aria-label','Increase quantity');
    plus.textContent = '+';

    container.insertBefore(minus, input);
    container.insertBefore(plus, input.nextSibling);

    minus.addEventListener('click', () => {
      let v = parseInt(input.value || '1', 10);
      if(isNaN(v)) v = 1;
      v = Math.max(1, v - 1);
      input.value = v;
      recalcRowSubtotal(container.closest('.cart-item'));
      recalcTotals();
    });

    plus.addEventListener('click', () => {
      let v = parseInt(input.value || '1', 10);
      if(isNaN(v)) v = 1;
      v = Math.min(999, v + 1);
      input.value = v;
      recalcRowSubtotal(container.closest('.cart-item'));
      recalcTotals();
    });

    input.addEventListener('change', () => {
      let v = parseInt(input.value || '1', 10);
      if(!isFinite(v) || v < 1){
        input.value = 1;
        input.classList.add('shake');
        setTimeout(()=>input.classList.remove('shake'), 400);
      }
      recalcRowSubtotal(container.closest('.cart-item'));
      recalcTotals();
    });

    container.dataset.enhanced = '1';
  }

  function addImageRemoveBtn(row){
    const thumb = $('.product-thumbnail', row);
    if(!thumb || thumb.querySelector('.image-remove-btn')) return;
    const btn = document.createElement('button');
    btn.className = 'image-remove-btn';
    btn.type = 'button';
    btn.title = 'Remove item';
    btn.textContent = '×';
    btn.addEventListener('click', () => removeRow(row));
    thumb.appendChild(btn);
  }

  function bindRemoveActions(row){
    $$('.product-remove a', row).forEach(el => {
      el.addEventListener('click', (ev) => {
        ev.preventDefault();
        removeRow(row);
      });
    });
  }

  function removeRow(row){
    row.classList.add('exit');
    row.addEventListener('animationend', () => {
      row.remove();
      recalcTotals();
    }, { once: true });
  }

  function animateRows(){
    const rows = $$('.cart-list .cart-item');
    rows.forEach((row, idx) => {
      row.style.animationDelay = `${idx * 80}ms`;
    });
  }

  function initShipping(){
    $$('.total-shipping input[type="checkbox"]').forEach(ch => {
      ch.addEventListener('change', recalcTotals);
    });
  }

  function init(){
    // Enhance rows
    const rows = $$('.cart-list .cart-item');
    rows.forEach(row => {
      // remove overlay remove button to avoid duplication with .product-remove
      bindRemoveActions(row);
      const qty = $('.cart-plus-minus', row);
      if(qty) injectQtyButtons(qty);
      recalcRowSubtotal(row);
    });
    animateRows();
    initShipping();
    recalcTotals();

    // Button ripple (simple shine handled by CSS hover ::after)
  }

  if(document.readyState === 'loading'){
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();