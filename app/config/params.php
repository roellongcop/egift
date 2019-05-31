<?php

return [
    'adminEmail' => 'admin@example.com',
    'user_status' => [
        0 => '<label class="badge badge-warning">Un-authorized</label>',
        1 => '<label class="badge badge-success">Authorized</label>',
        2 => '<label class="badge badge-danger">Block Listed</label>',
        9 => 'Deleted'
    ],
    'about_status' => [
        0 => '<label class="badge badge-success">Active</label>',
        1 => '<label class="badge badge-warning">Not-Active</label>',
    ],
    'promo_status' => [
        0 => '<label class="badge badge-success">Active</label>',
        1 => '<label class="badge badge-warning">Not-Active</label>',
        9 => 'Deleted'
    ],
    'personnel_status' => [
        0 => '<label class="badge badge-success">Active</label>',
        1 => '<label class="badge badge-warning">Not-Active</label>',
        9 => 'Deleted'
    ],

    'faq_status' => [
        0 => '<label class="badge badge-success">Active</label>',
        1 => '<label class="badge badge-warning">Not-Active</label>',
        9 => 'Deleted'
    ],

    'branch_status' => [
        0 => '<label class="badge badge-success">Active</label>',
        1 => '<label class="badge badge-warning">Not-Active</label>',
        9 => 'Deleted'
    ],
    
    'promo_status' => [
        0 => 'No',
        1 => 'Yes',
    ],

    'user_type' => [
    	9 => 'Administrator',
        8 => 'Merchant',
        7 => 'Corporate',
    	6 => 'Customer',
    ],
    'default_logo' => 'uploads/default/profile_small.png',
    
    'menu' => [
        'dashboard' => [
            'title' => 'Dashboard',
            'icon' => 'icon-speedometer',
        ],

       

        '#sales' => [
            'title' => 'Sales',
            'icon' => 'icon-grid',
            'sub' => [
                'sales' => [
                    'title' => 'All Sales',
                    'icon' => 'icon-badge',
                ],

                'sales/statistics' => [
                    'title' => 'Statistics',
                    'icon' => 'icon-badge',
                ],

                
            ]
        ],

        '#user' => [
            'title' => 'Company Users',
            'icon' => 'icon-grid',
            'sub' => [
                'user' => [
                    'title' => 'All Company Users',
                    'icon' => 'icon-badge',
                ],

                'user/statistics' => [
                    'title' => 'Statistics',
                    'icon' => 'icon-badge',
                ],

                
            ]
        ],


        '#customer' => [
            'title' => 'Customers',
            'icon' => 'icon-grid',
            'sub' => [
                'customer' => [
                    'title' => 'All Customers',
                    'icon' => 'icon-badge',
                ],

                 

                'user/statistics' => [
                    'title' => 'Statistics',
                    'icon' => 'icon-badge',
                ],
            ]
        ],
  

        
        '#corporate' => [
            'title' => 'Corporates',
            'icon' => 'icon-grid',
            'sub' => [
                'corporate' => [
                    'title' => 'All Corporate Accounts',
                    'icon' => 'icon-badge',
                ],

                'order' => [
                    'title' => 'Orders',
                    'icon' => 'icon-badge',
                ],

                'discount-setting' => [
                    'title' => 'Discount Settings',
                    'icon' => 'icon-speedometer',
                ],
                'corporate/statistics' => [
                    'title' => 'Statistics',
                    'icon' => 'icon-badge',
                ],
                
            ]
        ],

 
        '#merchant' => [
            'title' => 'Merchants',
            'icon' => 'icon-grid',
            'sub' => [
                'merchant' => [
                    'title' => 'All Merchants',
                    'icon' => 'icon-badge',
                ],

                'account-request' => [
                    'title' => 'Account Request',
                    'icon' => 'icon-badge',
                ],

                'branches' => [
                    'title' => 'Branches',
                    'icon' => 'icon-speedometer',
                ],

                'follower' => [
                    'title' => 'Followers',
                    'icon' => 'icon-basket',
                ],

                'nature-of-business' => [
                    'title' => 'Nature of Business',
                    'icon' => 'icon-star',
                ],

                'merchant/statistics' => [
                    'title' => 'Statistics',
                    'icon' => 'icon-badge',
                ],
                
            ]
        ],

        '#egift' => [
            'title' => 'E-Gifts',
            'icon' => 'icon-briefcase',
            'sub' => [
                'egift' => [
                    'title' => 'All Egifts',
                    'icon' => 'icon-wallet',
                ], 
                'egift-usage' => [
                    'title' => 'Usage',
                    'icon' => 'fa fa-bar-chart',
                ], 

                'wishlist' => [
                    'title' => 'Wishlist',
                    'icon' => 'fa fa-bar-chart',
                ], 
               
                'freebies' => [
                    'title' => 'Freebies Item',
                    'icon' => 'icon-basket',
                ],

                'rating' => [
                    'title' => 'Rating',
                    'icon' => 'icon-basket',
                ],

                'egift/statistics' => [
                    'title' => 'Statistics',
                    'icon' => 'icon-badge',
                ],

            ]
        ],
 
 
        '#information' => [
            'title' => 'Information',
            'icon' => 'icon-basket-loaded',
            'sub' => [  

                'about' => [
                    'title' => 'About Us',
                    'icon' => 'icon-speedometer',
                ],

                'personnel' => [
                    'title' => 'Our Personnels',
                    'icon' => 'icon-speedometer',
                ],

                'faq' => [
                    'title' => 'FAQ',
                    'icon' => 'icon-speedometer',
                ],
            ]
        ],


        '#settings' => [
            'title' => 'Settings',
            'icon' => 'icon-basket-loaded',
            'sub' => [  
                'icon' => [
                    'title' => 'Icons',
                    'icon' => 'icon-speedometer',
                ],

                'role' => [
                    'title' => 'User Role Access',
                    'icon' => 'icon-speedometer',
                ],
 

                'point-management' => [
                    'title' => 'Point Management',
                    'icon' => 'icon-star',
                ],

            ]
        ],


    ],
 

    
];
