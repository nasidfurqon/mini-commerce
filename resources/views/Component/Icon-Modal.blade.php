
                    <div class="modal fade" id="iconModal" tabindex="-1" aria-labelledby="iconModalLabel" aria-hidden="true">
                         <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                   <div class="modal-header">
                                        <h5 class="modal-title" id="iconModalLabel">Select Category Icon</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                                        
                                        <div class="search-container">
                                             <input type="text" id="icon-search" class="form-control" placeholder="Search icons...">
                                        </div>
                                        
                                        
                                        <ul class="nav nav-tabs" id="iconSourceTabs" role="tablist">
                                             <li class="nav-item" role="presentation">
                                                  <button class="nav-link active" id="fontawesome-tab-btn" data-bs-toggle="tab" data-bs-target="#fontawesome-tab" type="button" role="tab" aria-controls="fontawesome-tab" aria-selected="true">
                                                       <i class="fab fa-font-awesome-flag"></i>Font Awesome
                                                  </button>
                                             </li>
                                             <li class="nav-item" role="presentation">
                                                  <button class="nav-link" id="bootstrap-tab-btn" data-bs-toggle="tab" data-bs-target="#bootstrap-tab" type="button" role="tab" aria-controls="bootstrap-tab" aria-selected="false">
                                                       <i class="bi bi-bootstrap"></i>Bootstrap Icons
                                                  </button>
                                             </li>
                                             <li class="nav-item" role="presentation">
                                                  <button class="nav-link" id="feather-tab-btn" data-bs-toggle="tab" data-bs-target="#feather-tab" type="button" role="tab" aria-controls="feather-tab" aria-selected="false">
                                                       <i data-feather="feather"></i>Feather Icons
                                                  </button>
                                             </li>
                                             <li class="nav-item" role="presentation">
                                                  <button class="nav-link" id="lucide-tab-btn" data-bs-toggle="tab" data-bs-target="#lucide-tab" type="button" role="tab" aria-controls="lucide-tab" aria-selected="false">
                                                       <i data-lucide="zap"></i>Lucide Icons
                                                  </button>
                                             </li>
                                        </ul>

                                        
                                        <div class="tab-content" id="iconTabContent">
                                             
                                             <div class="tab-pane fade show active" id="fontawesome-tab" role="tabpanel" aria-labelledby="fontawesome-tab">
                                                  <div id="fontawesome-icons" class="virtual-scroll-container">
                                                       <div class="virtual-scroll-content">
                                                            
                                                       </div>
                                                  </div>
                                             </div>
                                             
                                             
                                             <div class="tab-pane fade" id="bootstrap-tab" role="tabpanel" aria-labelledby="bootstrap-tab">
                                                  <div id="bootstrap-icons" class="virtual-scroll-container">
                                                       <div class="virtual-scroll-content">
                                                            
                                                       </div>
                                                  </div>
                                             </div>
                                             
                                             
                                             <div class="tab-pane fade" id="feather-tab" role="tabpanel" aria-labelledby="feather-tab">
                                                  <div id="feather-icons" class="virtual-scroll-container">
                                                       <div class="virtual-scroll-content">
                                                            
                                                       </div>
                                                  </div>
                                             </div>
                                             
                                             
                                             <div class="tab-pane fade" id="lucide-tab" role="tabpanel" aria-labelledby="lucide-tab">
                                                  <div id="lucide-icons" class="virtual-scroll-container">
                                                       <div class="virtual-scroll-content">
                                                            
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        
                                        
                                        <div id="loading-indicator" class="loading-indicator text-center py-3" style="display: none;">
                                             <div class="loading-spinner"></div>
                                             <p class="mt-2 text-muted">Loading icons...</p>
                                        </div>
                                   </div>
                                   <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <style>
                    
                    .virtual-scroll-container {
                         position: relative;
                         overflow-y: auto;
                         overflow-x: hidden;
                         max-height: 450px;
                         height: 400px;
                         border: 1px solid #e3e6f0;
                         border-radius: 12px;
                         background: #f8f9fc;
                         padding: 20px;
                         scroll-behavior: smooth;
                    }
                    
                    .virtual-scroll-container::-webkit-scrollbar {
                         width: 8px;
                    }
                    
                    .virtual-scroll-container::-webkit-scrollbar-track {
                         background: #f1f1f1;
                         border-radius: 4px;
                    }
                    
                    .virtual-scroll-container::-webkit-scrollbar-thumb {
                         background: #c1c1c1;
                         border-radius: 4px;
                    }
                    
                    .virtual-scroll-container::-webkit-scrollbar-thumb:hover {
                         background: #a8a8a8;
                    }
                    
                    .virtual-scroll-content {
                         position: relative;
                         display: grid;
                         grid-template-columns: repeat(auto-fill, minmax(85px, 1fr));
                         gap: 16px;
                         padding: 5px;
                    }
                    
                    
                    @media (max-width: 768px) {
                         .virtual-scroll-content {
                              grid-template-columns: repeat(auto-fill, minmax(70px, 1fr));
                              gap: 12px;
                         }
                    }
                    
                    @media (min-width: 1200px) {
                         .virtual-scroll-content {
                              grid-template-columns: repeat(auto-fill, minmax(95px, 1fr));
                              gap: 20px;
                         }
                    }
                    
                    .icon-option {
                         aspect-ratio: 1;
                         display: flex;
                         flex-direction: column;
                         align-items: center;
                         justify-content: center;
                         border: 2px solid #e3e6f0;
                         border-radius: 12px;
                         background: #ffffff;
                         cursor: pointer;
                         transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
                         font-size: 1.4rem;
                         position: relative;
                         box-shadow: 0 2px 8px rgba(0,0,0,0.08);
                         overflow: hidden;
                         min-height: 85px;
                    }
                    
                    .icon-option::before {
                         content: '';
                         position: absolute;
                         top: 0;
                         left: -100%;
                         width: 100%;
                         height: 100%;
                         background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
                         transition: left 0.4s ease;
                    }
                    
                    .icon-option:hover::before {
                         left: 100%;
                    }
                    
                    .icon-option:hover {
                         border-color: var(--bs-primary) !important;
                         background: rgba(var(--bs-primary-rgb), 0.08) !important;
                         color: var(--bs-primary) !important;
                         transform: translateY(-2px);
                         box-shadow: 0 8px 20px rgba(var(--bs-primary-rgb), 0.15);
                    }
                    
                    
                    .icon-option i, .icon-option svg {
                         font-size: 1.5rem;
                         width: 24px;
                         height: 24px;
                         transition: all 0.25s ease;
                         margin-bottom: 4px;
                    }
                    
                    .icon-option:hover i, .icon-option:hover svg {
                         transform: scale(1.1);
                         filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
                    }
                    
                    .icon-option .icon-name {
                         font-size: 0.65rem;
                         font-weight: 500;
                         text-align: center;
                         opacity: 0.85;
                         transition: all 0.25s ease;
                         word-break: break-word;
                         line-height: 1.2;
                         max-width: 100%;
                         overflow: hidden;
                         text-overflow: ellipsis;
                         white-space: nowrap;
                         margin-top: 2px;
                    }
                    
                    .icon-option:hover .icon-name {
                         opacity: 1;
                         font-weight: 600;
                    }
                    
                    
                    .loading-indicator {
                         display: flex;
                         flex-direction: column;
                         justify-content: center;
                         align-items: center;
                         height: 120px;
                         font-size: 1rem;
                         color: #6c757d;
                         background: #f8f9fc;
                         border-radius: 12px;
                         margin: 10px 0;
                    }
                    
                    .loading-spinner {
                         width: 24px;
                         height: 24px;
                         border: 3px solid #e3e6f0;
                         border-top: 3px solid #4e73df;
                         border-radius: 50%;
                         animation: spin 1s linear infinite;
                         margin-bottom: 12px;
                    }
                    
                    @keyframes spin {
                         0% { transform: rotate(0deg); }
                         100% { transform: rotate(360deg); }
                    }
                    
                    
                    .nav-tabs {
                         border-bottom: 2px solid #e3e6f0;
                         margin-bottom: 25px;
                         background: #f8f9fc;
                         border-radius: 12px 12px 0 0;
                         padding: 8px 8px 0 8px;
                    }
                    
                    .nav-tabs .nav-link {
                         border: none;
                         border-radius: 10px 10px 0 0;
                         color: #5a5c69;
                         font-weight: 600;
                         padding: 14px 20px;
                         margin-right: 4px;
                         transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                         background: transparent;
                         position: relative;
                         overflow: hidden;
                    }
                    


                    

                    
                    .nav-tabs .nav-link.active::before {
                         opacity: 1;
                    }
                    
                    .nav-tabs .nav-link i, .nav-tabs .nav-link svg {
                         margin-right: 8px;
                         width: 18px;
                         height: 18px;
                         transition: transform 0.3s ease;
                    }
                    
                    .nav-tabs .nav-link:hover i, .nav-tabs .nav-link:hover svg {
                         transform: scale(1.1);
                    }
                    
                    
                    .tab-content {
                         min-height: 450px;
                         background: #ffffff;
                         border-radius: 0 0 12px 12px;
                         padding: 0;
                         box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                    }
                    
                    .tab-pane {
                         animation: fadeInUp 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                         padding: 0;
                    }
                    
                    @keyframes fadeInUp {
                         from { 
                              opacity: 0; 
                              transform: translateY(20px); 
                         }
                         to { 
                              opacity: 1; 
                              transform: translateY(0); 
                         }
                    }
                    
                    
                    .modal-content {
                         border-radius: 16px;
                         box-shadow: 0 15px 40px rgba(0,0,0,0.15);
                         border: none;
                         overflow: hidden;
                         backdrop-filter: blur(10px);
                    }
                    
                    .modal-header {
                         background: var(--bs-primary);
                         border-radius: 16px 16px 0 0;
                         padding: 24px 30px;
                         border-bottom: none;
                         position: relative;
                    }
                    
                    .modal-header::after {
                         content: '';
                         position: absolute;
                         bottom: 0;
                         left: 0;
                         right: 0;
                         height: 1px;
                         background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
                    }
                    
                    .modal-title {
                         font-weight: 600;
                         font-size: 1.35rem;
                         margin: 0;
                         text-shadow: 0 1px 2px rgba(252, 252, 252, 0.1);
                         color: white;
                    }
                    
                    .modal-body {
                         padding: 0;
                         background: var(--bs-secondary-bg);
                         max-height: 75vh;
                         overflow: hidden;
                         position: relative;
                    }
                    
                    .modal-body .container-fluid {
                         padding: 25px 30px;
                    }
                    
                    .modal-footer {
                         background: var(--bs-secondary-bg);
                         border-top: 1px solid var(--bs-border-color);
                         padding: 20px 30px;
                         border-radius: 0 0 16px 16px;
                         display: flex;
                         justify-content: flex-end;
                         gap: 12px;
                    }
                    
                    .modal-header .btn-close {
                         opacity: 0.8;
                         font-size: 1.1rem;
                         border-radius: 50%;
                         color: white;
                         width: 32px;
                         height: 32px;
                         display: flex;
                         align-items: center;
                         justify-content: center;
                    }
                    

                    
                    
                    .search-container {
                         margin-bottom: 25px;
                         position: relative;
                    }
                    
                    .search-container::before {
                         content: '\f002';
                         font-family: 'Font Awesome 5 Free';
                         font-weight: 900;
                         position: absolute;
                         left: 18px;
                         top: 50%;
                         transform: translateY(-50%);
                         color: var(--bs-secondary-color);
                         z-index: 10;
                         font-size: 1rem;
                    }
                    
                    .search-container input {
                         padding: 15px 20px 15px 50px;
                         border: 2px solid var(--bs-border-color);
                         border-radius: 12px;
                         font-size: 1rem;
                         transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                         background: var(--bs-body-bg);
                         box-shadow: 0 2px 4px rgba(0,0,0,0.05);
                    }
                    
                    .search-container input:focus {
                         border-color: var(--bs-primary);
                         box-shadow: 0 0 0 0.2rem rgba(var(--bs-primary-rgb), 0.15);
                         transform: translateY(-1px);
                         outline: none;
                    }
                    
                    .search-container input::placeholder {
                         color: var(--bs-secondary-color);
                         font-weight: 400;
                    }
                    
                    
                    .nav-tabs {
                         border-bottom: 2px solid var(--bs-border-color);
                         margin-bottom: 20px;
                         background: var(--bs-secondary-bg);
                         border-radius: 12px 12px 0 0;
                         padding: 8px 8px 0 8px;
                         box-shadow: 0 2px 4px rgba(0,0,0,0.05);
                    }
                    
                    .nav-tabs .nav-link {
                         border: none;
                         border-radius: 8px 8px 0 0;
                         color: var(--bs-secondary-color);
                         font-weight: 500;
                         padding: 12px 20px;
                         margin-right: 4px;
                         transition: all 0.3s ease;
                         position: relative;
                         background: transparent;
                    }
                    
                    .nav-tabs .nav-link:hover {
                         border-color: transparent;
                         background: rgba(var(--bs-primary-rgb), 0.1);
                         color: var(--bs-primary);
                         transform: translateY(-2px);
                    }
                    
                    .nav-tabs .nav-link.active {
                         background: var(--bs-primary);
                         color: #fff;
                         border-color: transparent;
                         box-shadow: 0 4px 12px rgba(var(--bs-primary-rgb), 0.3);
                         transform: translateY(-2px);
                    }
                    
                    .nav-tabs .nav-link.active::after {
                         content: '';
                         position: absolute;
                         bottom: -2px;
                         left: 0;
                         right: 0;
                         height: 2px;
                         background: var(--bs-primary);
                    }
                    
                    
                    .tab-content {
                         background: var(--bs-body-bg);
                         border-radius: 0 0 12px 12px;
                         box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                         overflow: hidden;
                    }
                    
                    .tab-pane {
                         min-height: 400px;
                         position: relative;
                    }
                    
                    
                    .icon-grid-container {
                         scrollbar-width: thin;
                         scrollbar-color: var(--bs-border-color) var(--bs-secondary-bg);
                    }
                    
                    .icon-grid-container::-webkit-scrollbar {
                         width: 8px;
                    }
                    
                    .icon-grid-container::-webkit-scrollbar-track {
                         background: var(--bs-secondary-bg);
                         border-radius: 4px;
                    }
                    
                    .icon-grid-container::-webkit-scrollbar-thumb {
                         background: var(--bs-border-color);
                         border-radius: 4px;
                         transition: background 0.2s ease;
                    }
                    
                    .icon-grid-container::-webkit-scrollbar-thumb:hover {
                         background: var(--bs-border-color);
                    }
                    
                    
                    .icon-option.selected {
                         background: rgba(var(--bs-primary-rgb), 0.08) !important;
                         border-color: var(--bs-primary) !important;
                         transform: scale(1.05) !important;
                         box-shadow: 0 4px 12px rgba(var(--bs-primary-rgb), 0.3) !important;
                         color: var(--bs-primary) !important;
                    }
                    
                    
                    .tab-pane.loading::before {
                         content: '';
                         position: absolute;
                         top: 50%;
                         left: 50%;
                         width: 40px;
                         height: 40px;
                         margin: -20px 0 0 -20px;
                         border: 3px solid var(--bs-border-color);
                         border-top: 3px solid var(--bs-primary);
                         border-radius: 50%;
                         animation: spin 1s linear infinite;
                         z-index: 10;
                    }
                    
                    @keyframes spin {
                         0% { transform: rotate(0deg); }
                         100% { transform: rotate(360deg); }
                    }
                    
                    
                    .btn-secondary {
                         background: var(--bs-secondary);
                         border: none;
                         border-radius: 10px;
                         padding: 12px 24px;
                         font-weight: 600;
                         transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                         color: white;
                    }
                    
                    .btn-secondary:hover {
                         background: var(--bs-secondary);
                         transform: translateY(-2px);
                         box-shadow: 0 6px 20px rgba(var(--bs-secondary-rgb), 0.3);
                         color: white;
                    }
                    
                    .btn-primary {
                         background: var(--bs-primary);
                         border: none;
                         border-radius: 10px;
                         padding: 12px 24px;
                         font-weight: 600;
                         transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                         color: white;
                    }
                    
                    .btn-primary:hover {
                         background: var(--bs-primary);
                         transform: translateY(-2px);
                         box-shadow: 0 6px 20px rgba(var(--bs-primary-rgb), 0.4);
                         color: white;
                    }
                    
                    
                    .tab-pane {
                         animation: fadeInUp 0.4s ease-out;
                    }
                    
                    @keyframes fadeInUp {
                         from { 
                              opacity: 0; 
                              transform: translateY(20px); 
                         }
                         to { 
                              opacity: 1; 
                              transform: translateY(0); 
                         }
                    }
                    
                    
                    .icon-category {
                         margin-bottom: 20px;
                    }
                    
                    .icon-category h6 {
                         color: var(--bs-secondary-color);
                         font-weight: 600;
                         margin-bottom: 12px;
                         padding-bottom: 8px;
                         border-bottom: 2px solid var(--bs-border-color);
                    }
                    
                    
                    .form-control:focus {
                         border-color: var(--bs-primary);
                         box-shadow: 0 0 0 0.2rem rgba(var(--bs-primary-rgb), 0.15);
                    }
                    
                    #icon-selector-btn {
                         transition: all 0.25s ease;
                         border-radius: 8px;
                         border: 2px solid var(--bs-border-color);
                         background: var(--bs-body-bg);
                         padding: 12px 16px;
                    }
                    
                    #icon-selector-btn:hover {
                         transform: translateY(-1px);
                         box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                         border-color: var(--bs-primary);
                         color: var(--bs-primary);
                    }

                    
                    #icon-selector-btn:hover,
                    #icon-selector-btn:hover #selected-icon,
                    #icon-selector-btn:hover #selected-icon-text {
                         color: var(--bs-primary) !important;
                    }
                    
                    </style>


                    <script>
                         document.addEventListener('DOMContentLoaded', function() {
                              const iconSelectorBtn = document.getElementById('icon-selector-btn');
                              const selectedIcon = document.getElementById('selected-icon');
                              const selectedIconText = document.getElementById('selected-icon-text');
                              const categoryIconInput = document.getElementById('category-icon');
                              const iconSearch = document.getElementById('icon-search');
                              const iconModal = document.getElementById('iconModal');
                              
                              
                              const iconLibraries = {
                                   fontawesome: {
                                        loaded: false,
                                        icons: [
                                             
                                             'fas fa-laptop', 'fas fa-mobile-alt', 'fas fa-desktop', 'fas fa-tablet-alt', 'fas fa-headphones',
                                             'fas fa-keyboard', 'fas fa-mouse', 'fas fa-camera', 'fas fa-tv', 'fas fa-gamepad',
                                             'fas fa-microchip', 'fas fa-wifi', 'fas fa-bluetooth', 'fas fa-usb', 'fas fa-hard-drive',
                                             'fas fa-memory', 'fas fa-server', 'fas fa-database', 'fas fa-code', 'fas fa-terminal',
                                             'fas fa-bug', 'fas fa-cogs', 'fas fa-wrench', 'fas fa-screwdriver', 'fas fa-hammer',
                                             'fas fa-robot', 'fas fa-satellite', 'fas fa-broadcast-tower', 'fas fa-router',
                                             
                                             
                                             'fas fa-tshirt', 'fas fa-hat-cowboy', 'fas fa-shoe-prints', 'fas fa-glasses', 'fas fa-gem',
                                             'fas fa-ring', 'fas fa-crown', 'fas fa-user-tie', 'fas fa-female', 'fas fa-male',
                                             'fas fa-hat-wizard', 'fas fa-mitten', 'fas fa-socks', 'fas fa-vest', 'fas fa-dress',
                                             'fas fa-bow-tie', 'fas fa-watch', 'fas fa-necklace', 'fas fa-earrings', 'fas fa-bracelet',
                                             
                                             
                                             'fas fa-home', 'fas fa-bed', 'fas fa-chair', 'fas fa-couch', 'fas fa-bath',
                                             'fas fa-utensils', 'fas fa-seedling', 'fas fa-leaf', 'fas fa-tree', 'fas fa-tools',
                                             'fas fa-door-open', 'fas fa-door-closed', 'fas fa-window-maximize', 'fas fa-lightbulb',
                                             'fas fa-fan', 'fas fa-toilet', 'fas fa-shower', 'fas fa-sink', 'fas fa-blender',
                                             'fas fa-microwave', 'fas fa-refrigerator', 'fas fa-washing-machine', 'fas fa-vacuum',
                                             
                                             
                                             'fas fa-coffee', 'fas fa-pizza-slice', 'fas fa-hamburger', 'fas fa-apple-alt', 'fas fa-wine-glass',
                                             'fas fa-beer', 'fas fa-ice-cream', 'fas fa-birthday-cake', 'fas fa-cookie-bite', 'fas fa-candy-cane',
                                             'fas fa-bread-slice', 'fas fa-cheese', 'fas fa-fish', 'fas fa-drumstick-bite', 'fas fa-carrot',
                                             'fas fa-pepper-hot', 'fas fa-lemon', 'fas fa-egg', 'fas fa-bacon', 'fas fa-hotdog',
                                             'fas fa-cocktail', 'fas fa-glass-martini', 'fas fa-mug-hot', 'fas fa-tea',
                                             
                                             
                                             'fas fa-football-ball', 'fas fa-basketball-ball', 'fas fa-tennis-ball', 'fas fa-volleyball-ball',
                                             'fas fa-golf-ball', 'fas fa-swimming-pool', 'fas fa-bicycle', 'fas fa-running', 'fas fa-dumbbell',
                                             'fas fa-skiing', 'fas fa-snowboarding', 'fas fa-hiking', 'fas fa-bowling-ball', 'fas fa-ping-pong-paddle-ball',
                                             'fas fa-baseball-ball', 'fas fa-hockey-puck', 'fas fa-quidditch', 'fas fa-trophy', 'fas fa-medal',
                                             'fas fa-award', 'fas fa-ribbon', 'fas fa-chess', 'fas fa-dice',
                                             
                                             
                                             'fas fa-book', 'fas fa-graduation-cap', 'fas fa-pencil-alt', 'fas fa-calculator', 'fas fa-microscope',
                                             'fas fa-atom', 'fas fa-globe', 'fas fa-chalkboard-teacher', 'fas fa-university', 'fas fa-bookmark',
                                             'fas fa-book-open', 'fas fa-journal-whills', 'fas fa-spell-check', 'fas fa-highlighter',
                                             'fas fa-eraser', 'fas fa-ruler', 'fas fa-compass', 'fas fa-flask', 'fas fa-dna',
                                             'fas fa-brain', 'fas fa-school', 'fas fa-blackboard',
                                             
                                             
                                             'fas fa-heart', 'fas fa-pills', 'fas fa-stethoscope', 'fas fa-hospital', 'fas fa-user-md',
                                             'fas fa-first-aid', 'fas fa-syringe', 'fas fa-thermometer', 'fas fa-band-aid', 'fas fa-tooth',
                                             'fas fa-heartbeat', 'fas fa-ambulance', 'fas fa-wheelchair', 'fas fa-crutch', 'fas fa-x-ray',
                                             'fas fa-lungs', 'fas fa-eye', 'fas fa-ear', 'fas fa-hand-holding-heart', 'fas fa-capsules',
                                             
                                             
                                             'fas fa-briefcase', 'fas fa-chart-line', 'fas fa-dollar-sign', 'fas fa-piggy-bank', 'fas fa-credit-card',
                                             'fas fa-coins', 'fas fa-handshake', 'fas fa-building', 'fas fa-chart-pie', 'fas fa-receipt',
                                             'fas fa-balance-scale', 'fas fa-bank', 'fas fa-vault', 'fas fa-cash-register',
                                             'fas fa-money-bill', 'fas fa-money-check', 'fas fa-percentage', 'fas fa-chart-bar',
                                             
                                             
                                             'fas fa-car', 'fas fa-truck', 'fas fa-motorcycle', 'fas fa-bus',
                                             'fas fa-train', 'fas fa-plane', 'fas fa-helicopter', 'fas fa-ship', 'fas fa-rocket',
                                             'fas fa-taxi', 'fas fa-subway', 'fas fa-tram', 'fas fa-anchor', 'fas fa-parachute-box',
                                             
                                             
                                             'fas fa-sun', 'fas fa-moon', 'fas fa-cloud', 'fas fa-cloud-rain', 'fas fa-snowflake',
                                             'fas fa-bolt', 'fas fa-rainbow', 'fas fa-wind', 'fas fa-tornado', 'fas fa-hurricane',
                                             'fas fa-mountain', 'fas fa-volcano', 'fas fa-water', 'fas fa-fire', 'fas fa-icicles',
                                             
                                             
                                             'fas fa-star', 'fas fa-check', 'fas fa-times', 'fas fa-plus', 'fas fa-minus',
                                             'fas fa-arrow-up', 'fas fa-arrow-down', 'fas fa-arrow-left', 'fas fa-arrow-right', 'fas fa-info',
                                             'fas fa-question', 'fas fa-exclamation', 'fas fa-warning', 'fas fa-bell', 'fas fa-envelope',
                                             'fas fa-phone', 'fas fa-fax', 'fas fa-print', 'fas fa-save', 'fas fa-edit',
                                             'fas fa-trash', 'fas fa-copy', 'fas fa-cut', 'fas fa-paste', 'fas fa-undo',
                                             'fas fa-redo', 'fas fa-search', 'fas fa-filter', 'fas fa-sort', 'fas fa-list',
                                             'fas fa-th', 'fas fa-th-large', 'fas fa-th-list', 'fas fa-bars', 'fas fa-ellipsis-h',
                                             'fas fa-cog', 'fas fa-key', 'fas fa-lock', 'fas fa-unlock',
                                             'fas fa-user', 'fas fa-users', 'fas fa-user-plus', 'fas fa-user-minus', 'fas fa-user-check',
                                             'fas fa-folder', 'fas fa-folder-open', 'fas fa-file', 'fas fa-file-alt', 'fas fa-download',
                                             'fas fa-upload', 'fas fa-cloud-download-alt', 'fas fa-cloud-upload-alt', 'fas fa-link',
                                             'fas fa-unlink', 'fas fa-share', 'fas fa-share-alt', 'fas fa-external-link-alt'
                                        ]
                                   },
                                   bootstrap: {
                                        loaded: false,
                                        icons: [
                                             
                                             'bi bi-house', 'bi bi-person', 'bi bi-gear', 'bi bi-search', 'bi bi-heart',
                                             'bi bi-star', 'bi bi-cart', 'bi bi-bag', 'bi bi-phone', 'bi bi-envelope',
                                             'bi bi-calendar', 'bi bi-clock', 'bi bi-camera', 'bi bi-image', 'bi bi-music-note',
                                             'bi bi-play', 'bi bi-pause', 'bi bi-stop', 'bi bi-volume-up', 'bi bi-volume-down',
                                             'bi bi-wifi', 'bi bi-bluetooth', 'bi bi-battery', 'bi bi-power', 'bi bi-shield',
                                             'bi bi-lock', 'bi bi-unlock', 'bi bi-key', 'bi bi-eye', 'bi bi-eye-slash',
                                             'bi bi-download', 'bi bi-upload', 'bi bi-cloud', 'bi bi-folder', 'bi bi-file',
                                             'bi bi-printer', 'bi bi-scissors', 'bi bi-clipboard', 'bi bi-bookmark', 'bi bi-tag',
                                             'bi bi-flag', 'bi bi-trophy', 'bi bi-award', 'bi bi-gift', 'bi bi-balloon',
                                             'bi bi-cake', 'bi bi-cup', 'bi bi-droplet', 'bi bi-sun', 'bi bi-moon',
                                             
                                             
                                             'bi bi-alarm', 'bi bi-archive', 'bi bi-arrow-down', 'bi bi-arrow-left', 'bi bi-arrow-right',
                                             'bi bi-arrow-up', 'bi bi-at', 'bi bi-bell', 'bi bi-book', 'bi bi-bookmark-fill',
                                             'bi bi-box', 'bi bi-briefcase', 'bi bi-brush', 'bi bi-bug', 'bi bi-building',
                                             'bi bi-calculator', 'bi bi-calendar-event', 'bi bi-camera-fill', 'bi bi-card-image',
                                             'bi bi-cart-fill', 'bi bi-chat', 'bi bi-check', 'bi bi-check-circle',
                                             'bi bi-chevron-down', 'bi bi-chevron-left', 'bi bi-chevron-right', 'bi bi-chevron-up',
                                             'bi bi-circle', 'bi bi-clipboard-check', 'bi bi-cloud-download', 'bi bi-cloud-upload',
                                             'bi bi-code', 'bi bi-collection', 'bi bi-compass', 'bi bi-cpu', 'bi bi-credit-card',
                                             'bi bi-cursor', 'bi bi-dash', 'bi bi-database', 'bi bi-diagram-3', 'bi bi-diamond',
                                             'bi bi-dice-1', 'bi bi-dice-2', 'bi bi-dice-3', 'bi bi-dice-4', 'bi bi-dice-5',
                                             'bi bi-dice-6', 'bi bi-display', 'bi bi-door-closed', 'bi bi-door-open',
                                             'bi bi-easel', 'bi bi-egg', 'bi bi-emoji-smile', 'bi bi-exclamation', 'bi bi-facebook',
                                             'bi bi-file-earmark', 'bi bi-file-text', 'bi bi-filter', 'bi bi-fingerprint',
                                             'bi bi-fire', 'bi bi-flower1', 'bi bi-folder2', 'bi bi-fonts', 'bi bi-forward',
                                             'bi bi-gem', 'bi bi-geo', 'bi bi-globe', 'bi bi-graph-up', 'bi bi-grid',
                                             'bi bi-hammer', 'bi bi-hand-thumbs-up', 'bi bi-headphones', 'bi bi-heart-fill',
                                             'bi bi-house-door', 'bi bi-inbox', 'bi bi-info', 'bi bi-journal', 'bi bi-joystick',
                                             'bi bi-keyboard', 'bi bi-laptop', 'bi bi-layers', 'bi bi-lightbulb', 'bi bi-link',
                                             'bi bi-list', 'bi bi-magic', 'bi bi-map', 'bi bi-megaphone', 'bi bi-mic',
                                             'bi bi-mouse', 'bi bi-music-note-beamed', 'bi bi-newspaper', 'bi bi-palette',
                                             'bi bi-patch-check', 'bi bi-pencil', 'bi bi-people', 'bi bi-percent', 'bi bi-person-fill',
                                             'bi bi-pie-chart', 'bi bi-pin', 'bi bi-play-fill', 'bi bi-plus', 'bi bi-puzzle',
                                             'bi bi-question', 'bi bi-rainbow', 'bi bi-receipt', 'bi bi-record', 'bi bi-reply',
                                             'bi bi-save', 'bi bi-share', 'bi bi-shield-check', 'bi bi-shop', 'bi bi-shuffle',
                                             'bi bi-skip-backward', 'bi bi-skip-forward', 'bi bi-snow', 'bi bi-speedometer',
                                             'bi bi-star-fill', 'bi bi-stopwatch', 'bi bi-tablet', 'bi bi-telephone',
                                             'bi bi-thermometer', 'bi bi-tools', 'bi bi-trash', 'bi bi-tree', 'bi bi-truck',
                                             'bi bi-tv', 'bi bi-umbrella', 'bi bi-vector-pen', 'bi bi-wallet', 'bi bi-watch',
                                             'bi bi-x', 'bi bi-zoom-in', 'bi bi-zoom-out'
                                        ]
                                   },
                                   feather: {
                                        loaded: false,
                                        icons: [
                                             
                                             'feather activity', 'feather airplay', 'feather alert-circle', 'feather alert-octagon', 'feather alert-triangle',
                                             'feather align-center', 'feather align-justify', 'feather align-left', 'feather align-right', 'feather anchor',
                                             'feather aperture', 'feather archive', 'feather arrow-down', 'feather arrow-down-circle', 'feather arrow-down-left',
                                             'feather arrow-down-right', 'feather arrow-left', 'feather arrow-left-circle', 'feather arrow-right',
                                             'feather arrow-right-circle', 'feather arrow-up', 'feather arrow-up-circle', 'feather arrow-up-left',
                                             'feather arrow-up-right', 'feather at-sign', 'feather award', 'feather bar-chart', 'feather bar-chart-2',
                                             'feather battery', 'feather battery-charging', 'feather bell', 'feather bell-off', 'feather bluetooth',
                                             'feather bold', 'feather book', 'feather book-open', 'feather bookmark', 'feather box',
                                             'feather briefcase', 'feather calendar', 'feather camera', 'feather camera-off', 'feather cast',
                                             'feather check', 'feather check-circle', 'feather check-square', 'feather chevron-down', 'feather chevron-left',
                                             'feather chevron-right', 'feather chevron-up', 'feather chevrons-down', 'feather chevrons-left',
                                             'feather chevrons-right', 'feather chevrons-up', 'feather chrome', 'feather circle', 'feather clipboard',
                                             'feather clock', 'feather cloud', 'feather cloud-drizzle', 'feather cloud-lightning', 'feather cloud-off',
                                             'feather cloud-rain', 'feather cloud-snow', 'feather code', 'feather codepen', 'feather codesandbox',
                                             'feather coffee', 'feather columns', 'feather command', 'feather compass', 'feather copy',
                                             'feather corner-down-left', 'feather corner-down-right', 'feather corner-left-down', 'feather corner-left-up',
                                             'feather corner-right-down', 'feather corner-right-up', 'feather corner-up-left', 'feather corner-up-right',
                                             'feather cpu', 'feather credit-card', 'feather crop', 'feather crosshair', 'feather database',
                                             'feather delete', 'feather disc', 'feather divide', 'feather divide-circle', 'feather divide-square',
                                             'feather dollar-sign', 'feather download', 'feather download-cloud', 'feather dribbble', 'feather droplet',
                                             'feather edit', 'feather edit-2', 'feather edit-3', 'feather external-link', 'feather eye',
                                             'feather eye-off', 'feather facebook', 'feather fast-forward', 'feather feather', 'feather figma',
                                             'feather file', 'feather file-minus', 'feather file-plus', 'feather file-text', 'feather film',
                                             'feather filter', 'feather flag', 'feather folder', 'feather folder-minus', 'feather folder-plus',
                                             'feather framer', 'feather frown', 'feather gift', 'feather git-branch', 'feather git-commit',
                                             'feather git-merge', 'feather git-pull-request', 'feather github', 'feather gitlab', 'feather globe',
                                             'feather grid', 'feather hard-drive', 'feather hash', 'feather headphones', 'feather heart',
                                             'feather help-circle', 'feather hexagon', 'feather home', 'feather image', 'feather inbox',
                                             'feather info', 'feather instagram', 'feather italic', 'feather key', 'feather layers',
                                             'feather layout', 'feather life-buoy', 'feather link', 'feather link-2', 'feather linkedin',
                                             'feather list', 'feather loader', 'feather lock', 'feather log-in', 'feather log-out',
                                             'feather mail', 'feather map', 'feather map-pin', 'feather maximize', 'feather maximize-2',
                                             'feather meh', 'feather menu', 'feather message-circle', 'feather message-square', 'feather mic',
                                             'feather mic-off', 'feather minimize', 'feather minimize-2', 'feather minus', 'feather minus-circle',
                                             'feather minus-square', 'feather monitor', 'feather moon', 'feather more-horizontal', 'feather more-vertical',
                                             'feather mouse-pointer', 'feather move', 'feather music', 'feather navigation', 'feather navigation-2',
                                             'feather octagon', 'feather package', 'feather paperclip', 'feather pause', 'feather pause-circle',
                                             'feather pen-tool', 'feather percent', 'feather phone', 'feather phone-call', 'feather phone-forwarded',
                                             'feather phone-incoming', 'feather phone-missed', 'feather phone-off', 'feather phone-outgoing',
                                             'feather pie-chart', 'feather play', 'feather play-circle', 'feather plus', 'feather plus-circle',
                                             'feather plus-square', 'feather pocket', 'feather power', 'feather printer', 'feather radio',
                                             'feather refresh-ccw', 'feather refresh-cw', 'feather repeat', 'feather rewind', 'feather rotate-ccw',
                                             'feather rotate-cw', 'feather rss', 'feather save', 'feather scissors', 'feather search',
                                             'feather send', 'feather server', 'feather settings', 'feather share', 'feather share-2',
                                             'feather shield', 'feather shield-off', 'feather shopping-bag', 'feather shopping-cart', 'feather shuffle',
                                             'feather sidebar', 'feather skip-back', 'feather skip-forward', 'feather slack', 'feather slash',
                                             'feather sliders', 'feather smartphone', 'feather smile', 'feather speaker', 'feather square',
                                             'feather star', 'feather stop-circle', 'feather sun', 'feather sunrise', 'feather sunset',
                                             'feather tablet', 'feather tag', 'feather target', 'feather terminal', 'feather thermometer',
                                             'feather thumbs-down', 'feather thumbs-up', 'feather toggle-left', 'feather toggle-right', 'feather tool',
                                             'feather trash', 'feather trash-2', 'feather triangle', 'feather truck', 'feather tv',
                                             'feather twitch', 'feather twitter', 'feather type', 'feather umbrella', 'feather underline',
                                             'feather unlock', 'feather upload', 'feather upload-cloud', 'feather user', 'feather user-check',
                                             'feather user-minus', 'feather user-plus', 'feather user-x', 'feather users', 'feather video',
                                             'feather video-off', 'feather voicemail', 'feather volume', 'feather volume-1', 'feather volume-2',
                                             'feather volume-x', 'feather watch', 'feather wifi', 'feather wifi-off', 'feather wind',
                                             'feather x', 'feather x-circle', 'feather x-octagon', 'feather x-square', 'feather youtube',
                                             'feather zap', 'feather zap-off', 'feather zoom-in', 'feather zoom-out'
                                        ]
                                   },
                                   lucide: {
                                        loaded: false,
                                        icons: [
                                             
                                             'lucide zap', 'lucide heart', 'lucide star', 'lucide home', 'lucide user',
                                             'lucide settings', 'lucide search', 'lucide mail', 'lucide phone', 'lucide calendar',
                                             'lucide clock', 'lucide camera', 'lucide image', 'lucide music', 'lucide play',
                                             'lucide pause', 'lucide stop', 'lucide volume-2', 'lucide volume-1', 'lucide wifi',
                                             'lucide bluetooth', 'lucide battery', 'lucide power', 'lucide shield', 'lucide lock',
                                             'lucide unlock', 'lucide key', 'lucide eye', 'lucide eye-off', 'lucide download',
                                             'lucide upload', 'lucide cloud', 'lucide folder', 'lucide file', 'lucide printer',
                                             'lucide scissors', 'lucide clipboard', 'lucide bookmark', 'lucide tag', 'lucide flag',
                                             'lucide trophy', 'lucide award', 'lucide gift', 'lucide balloon', 'lucide cake',
                                             'lucide coffee', 'lucide droplets', 'lucide sun', 'lucide moon', 'lucide activity',
                                             'lucide airplay', 'lucide alert-circle', 'lucide alert-octagon', 'lucide alert-triangle',
                                             'lucide align-center', 'lucide align-justify', 'lucide align-left', 'lucide align-right',
                                             'lucide anchor', 'lucide aperture', 'lucide archive', 'lucide arrow-down', 'lucide arrow-left',
                                             'lucide arrow-right', 'lucide arrow-up', 'lucide at-sign', 'lucide bar-chart', 'lucide bell',
                                             'lucide bold', 'lucide book', 'lucide book-open', 'lucide box', 'lucide briefcase',
                                             'lucide cast', 'lucide check', 'lucide check-circle', 'lucide chevron-down', 'lucide chevron-left',
                                             'lucide chevron-right', 'lucide chevron-up', 'lucide circle', 'lucide code', 'lucide command',
                                             'lucide compass', 'lucide copy', 'lucide cpu', 'lucide credit-card', 'lucide crop',
                                             'lucide crosshair', 'lucide database', 'lucide delete', 'lucide disc', 'lucide dollar-sign',
                                             'lucide download-cloud', 'lucide edit', 'lucide external-link', 'lucide fast-forward',
                                             'lucide feather', 'lucide file-minus', 'lucide file-plus', 'lucide file-text', 'lucide film',
                                             'lucide filter', 'lucide folder-minus', 'lucide folder-plus', 'lucide frown', 'lucide git-branch',
                                             'lucide git-commit', 'lucide git-merge', 'lucide git-pull-request', 'lucide globe', 'lucide grid',
                                             'lucide hard-drive', 'lucide hash', 'lucide headphones', 'lucide help-circle', 'lucide hexagon',
                                             'lucide inbox', 'lucide info', 'lucide italic', 'lucide layers', 'lucide layout',
                                             'lucide life-buoy', 'lucide link', 'lucide list', 'lucide loader', 'lucide log-in',
                                             'lucide log-out', 'lucide map', 'lucide map-pin', 'lucide maximize', 'lucide meh',
                                             'lucide menu', 'lucide message-circle', 'lucide message-square', 'lucide mic', 'lucide mic-off',
                                             'lucide minimize', 'lucide minus', 'lucide minus-circle', 'lucide monitor', 'lucide more-horizontal',
                                             'lucide more-vertical', 'lucide mouse-pointer', 'lucide move', 'lucide navigation', 'lucide octagon',
                                             'lucide package', 'lucide paperclip', 'lucide pause-circle', 'lucide pen-tool', 'lucide percent',
                                             'lucide phone-call', 'lucide phone-forwarded', 'lucide phone-incoming', 'lucide phone-missed',
                                             'lucide phone-off', 'lucide phone-outgoing', 'lucide pie-chart', 'lucide play-circle',
                                             'lucide plus', 'lucide plus-circle', 'lucide pocket', 'lucide radio', 'lucide refresh-ccw',
                                             'lucide refresh-cw', 'lucide repeat', 'lucide rewind', 'lucide rotate-ccw', 'lucide rotate-cw',
                                             'lucide rss', 'lucide save', 'lucide send', 'lucide server', 'lucide share', 'lucide shield-off',
                                             'lucide shopping-bag', 'lucide shopping-cart', 'lucide shuffle', 'lucide sidebar', 'lucide skip-back',
                                             'lucide skip-forward', 'lucide slash', 'lucide sliders', 'lucide smartphone', 'lucide smile',
                                             'lucide speaker', 'lucide square', 'lucide stop-circle', 'lucide sunrise', 'lucide sunset',
                                             'lucide tablet', 'lucide target', 'lucide terminal', 'lucide thermometer', 'lucide thumbs-down',
                                             'lucide thumbs-up', 'lucide toggle-left', 'lucide toggle-right', 'lucide tool', 'lucide trash',
                                             'lucide triangle', 'lucide truck', 'lucide tv', 'lucide type', 'lucide umbrella',
                                             'lucide underline', 'lucide upload-cloud', 'lucide user-check', 'lucide user-minus',
                                             'lucide user-plus', 'lucide user-x', 'lucide users', 'lucide video', 'lucide video-off',
                                             'lucide voicemail', 'lucide volume', 'lucide volume-x', 'lucide watch', 'lucide wifi-off',
                                             'lucide wind', 'lucide x', 'lucide x-circle', 'lucide x-octagon', 'lucide zap-off',
                                             'lucide zoom-in', 'lucide zoom-out'
                                        ]
                                   }
                              };
                              
                              
                              function loadIcons(library) {
                                   if (iconLibraries[library].loaded) return;
                                   
                                   const container = document.getElementById(`${library}-icons`);
                                   if (!container) {
                                        console.error(`Container not found for ${library}`);
                                        return;
                                   }
                                   
                                   
                                   let contentContainer = container.querySelector('.virtual-scroll-content');
                                   if (!contentContainer) {
                                        console.error(`Content container not found for ${library}`);
                                        return;
                                   }
                                   
                                   
                                   contentContainer.innerHTML = '';
                                   
                                   
                                   const loadingIndicator = document.getElementById('loading-indicator');
                                   if (loadingIndicator) {
                                        loadingIndicator.style.display = 'block';
                                   }
                                   
                                   
                                   const iconsToShow = iconLibraries[library].filteredIcons || iconLibraries[library].icons;
                                   
                                   
                                   setTimeout(() => {
                                        
                                        contentContainer.style.display = 'grid';
                                        
                                        
                                        iconsToShow.forEach((iconClass) => {
                                             const iconElement = document.createElement('div');
                                             iconElement.className = 'icon-option';
                                             iconElement.setAttribute('data-icon', iconClass);
                                             iconElement.style.cssText = `
                                                  display: flex;
                                                  flex-direction: column;
                                                  align-items: center;
                                                  justify-content: center;
                                                  padding: 12px 8px;
                                                  border: 2px solid #e0e0e0;
                                                  border-radius: 8px;
                                                  cursor: pointer;
                                                  transition: all 0.3s ease;
                                                  background: white;
                                                  min-height: 70px;
                                                  text-align: center;
                                             `;
                                             
                                             
                                             let iconHTML = '';
                                             let labelText = '';
                                             
                                             if (library === 'feather' && iconClass.startsWith('feather ')) {
                                                  const featherIcon = iconClass.replace('feather ', '');
                                                  iconHTML = `<i data-feather="${featherIcon}" style="width: 24px; height: 24px; margin-bottom: 4px;"></i>`;
                                                  labelText = featherIcon;
                                             } else if (library === 'lucide' && iconClass.startsWith('lucide ')) {
                                                  const lucideIcon = iconClass.replace('lucide ', '');
                                                  iconHTML = `<i data-lucide="${lucideIcon}" style="width: 24px; height: 24px; margin-bottom: 4px;"></i>`;
                                                  labelText = lucideIcon;
                                             } else {
                                                  iconHTML = `<i class="${iconClass}" style="font-size: 24px; color: #666; margin-bottom: 4px;"></i>`;
                                                  labelText = iconClass.replace(/^(fas fa-|bi bi-)/, '');
                                             }
                                             
                                             
                                             const label = document.createElement('small');
                                             label.textContent = labelText;
                                             label.style.cssText = `
                                                  font-size: 10px;
                                                  color: #999;
                                                  text-align: center;
                                                  word-break: break-word;
                                                  line-height: 1.2;
                                                  max-width: 100%;
                                             `;
                                             
                                             iconElement.innerHTML = iconHTML;
                                             iconElement.appendChild(label);
                                             
                                             
                                             iconElement.addEventListener('mouseenter', function() {
                                                  if (!this.classList.contains('selected')) {
                                                       this.style.borderColor = '#2196f3';
                                                       this.style.backgroundColor = '#f5f5f5';
                                                       this.style.transform = 'translateY(-2px)';
                                                       this.style.boxShadow = '0 4px 8px rgba(0,0,0,0.1)';
                                                  }
                                             });
                                             
                                             iconElement.addEventListener('mouseleave', function() {
                                                  if (!this.classList.contains('selected')) {
                                                       this.style.borderColor = '#e0e0e0';
                                                       this.style.backgroundColor = 'white';
                                                       this.style.transform = 'translateY(0)';
                                                       this.style.boxShadow = 'none';
                                                  }
                                             });
                                             
                                             
                                             iconElement.addEventListener('click', function() {
                                                  selectIcon(iconClass, this);
                                             });
                                             
                                             contentContainer.appendChild(iconElement);
                                        });
                                        
                                        
                                        if (library === 'feather' && typeof feather !== 'undefined') {
                                             feather.replace();
                                        } else if (library === 'lucide' && typeof lucide !== 'undefined') {
                                             lucide.createIcons();
                                        }
                                        
                                        
                                        if (loadingIndicator) {
                                             loadingIndicator.style.display = 'none';
                                        }
                                        
                                        
                                        iconLibraries[library].loaded = true;
                                        
                                        
                                        setTimeout(() => {
                                             highlightSelectedIcon();
                                        }, 100);
                                        
                                   }, 100);
                              }
                              
                              
                              function selectIcon(iconClass, element) {
                                   
                                   if (iconClass.startsWith('feather ')) {
                                        const featherIcon = iconClass.replace('feather ', '');
                                        selectedIcon.innerHTML = `<i data-feather="${featherIcon}" style="width: 1.2rem; height: 1.2rem;"></i>`;
                                        selectedIcon.className = 'me-2';
                                        if (typeof feather !== 'undefined') {
                                             feather.replace();
                                        }
                                   } else if (iconClass.startsWith('lucide ')) {
                                        const lucideIcon = iconClass.replace('lucide ', '');
                                        selectedIcon.innerHTML = `<i data-lucide="${lucideIcon}" style="width: 1.2rem; height: 1.2rem;"></i>`;
                                        selectedIcon.className = 'me-2';
                                        if (typeof lucide !== 'undefined') {
                                             lucide.createIcons();
                                        }
                                   } else {
                                        selectedIcon.className = iconClass + ' me-2';
                                        selectedIcon.style.fontSize = '1.2rem';
                                   }
                                   
                                   selectedIconText.textContent = 'Icon Selected';
                                   categoryIconInput.value = iconClass;
                                   
                                   
                                   document.querySelectorAll('.icon-option').forEach(opt => {
                                        opt.classList.remove('selected');
                                   });
                                   
                                   
                                   element.classList.add('selected');
                                   
                                   
                                   const modal = bootstrap.Modal.getInstance(iconModal);
                                   modal.hide();
                              }
                              
                              
                              document.querySelectorAll('#iconSourceTabs button').forEach(function(tab) {
                                   tab.addEventListener('shown.bs.tab', function(e) {
                                        const targetId = e.target.getAttribute('data-bs-target').replace('#', '');
                                        const library = targetId.replace('-tab', '');
                                        
                                        console.log('Tab switched to:', library);
                                        
                                        
                                        iconSearch.value = '';
                                        
                                        
                                        Object.keys(iconLibraries).forEach(lib => {
                                             iconLibraries[lib].filteredIcons = null;
                                        });
                                        
                                        
                                        iconLibraries[library].loaded = false;
                                        loadIcons(library);
                                   });
                              });
                              
                              
                              function highlightSelectedIcon() {
                                   const currentIcon = categoryIconInput.value;
                                   if (currentIcon) {
                                        
                                        document.querySelectorAll('.icon-option').forEach(opt => {
                                             opt.classList.remove('selected');
                                        });
                                        
                                        
                                        const selectedElement = document.querySelector(`[data-icon="${currentIcon}"]`);
                                        if (selectedElement) {
                                             selectedElement.classList.add('selected');
                                        }
                                   }
                              }
                              
                              
                              iconSearch.addEventListener('input', function() {
                                   const searchTerm = this.value.toLowerCase();
                                   const activeTabButton = document.querySelector('#iconSourceTabs .nav-link.active');
                                   
                                   if (activeTabButton) {
                                        const targetId = activeTabButton.getAttribute('data-bs-target').replace('#', '');
                                        const library = targetId.replace('-tab', '');
                                        
                                        if (searchTerm === '') {
                                             
                                             iconLibraries[library].filteredIcons = null;
                                        } else {
                                             
                                             iconLibraries[library].filteredIcons = iconLibraries[library].icons.filter(iconClass => {
                                                  const iconName = iconClass.replace(/^(fas fa-|bi bi-|feather |lucide )/, '').replace(/-/g, ' ');
                                                  return iconName.includes(searchTerm) || iconClass.toLowerCase().includes(searchTerm);
                                             });
                                        }
                                        
                                        
                                        iconLibraries[library].loaded = false;
                                        
                                        
                                        loadIcons(library);
                                   }
                              });
                              
                              
                              iconModal.addEventListener('show.bs.modal', function() {
                                   
                                   iconSearch.value = '';
                                   
                                   
                                   Object.keys(iconLibraries).forEach(lib => {
                                        iconLibraries[lib].loaded = false;
                                        iconLibraries[lib].filteredIcons = null;
                                   });
                                   
                                   
                                   loadIcons('fontawesome');
                                   
                                   
                                   setTimeout(() => {
                                        highlightSelectedIcon();
                                   }, 300);
                              });
                              
                              
                              if (typeof feather !== 'undefined') {
                                   feather.replace();
                              }
                              if (typeof lucide !== 'undefined') {
                                   lucide.createIcons();
                              }
                         });
                    </script>