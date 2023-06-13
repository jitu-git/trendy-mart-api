<?php

return [

    "admin" => [

        "Masters" => [

            "Product Manager" => [

                "base" => "admin.products",
                "icon" => icon("website_manager_svg"),

                "scope" => [
                    "admin.products.category.index"
                ],

                "menus" => [
                    "Categories" => [
                        "scope" => ["admin.products.category.index", "admin.products.category.create"],
                        "links" => [
                            [
                                "title" => "List",
                                "route" => "admin.products.category.index",
                                "scope" => "admin.products.category.index"
                            ],
                            [
                                "title" => "Add",
                                "route" => "admin.products.category.create",
                                "scope" => "admin.products.category.create"
                            ]
                        ]
                    ],
                    "Colors" => [
                        "scope" => ["admin.products.color.index"],
                        "links" => [
                            [
                                "title" => "List",
                                "route" => "admin.products.color.index",
                                "scope" => "admin.products.color.index"
                            ],
                            [
                                "title" => "Add",
                                "route" => "admin.products.color.create",
                                "scope" => "admin.products.color.create"
                            ]
                        ]
                    ],
                    "Size" => [
                        "scope" => ["admin.products.size.index"],
                        "links" => [
                            [
                                "title" => "List",
                                "route" => "admin.products.size.index",
                                "scope" => "admin.products.size.index"
                            ],
                            [
                                "title" => "Add",
                                "route" => "admin.products.size.create",
                                "scope" => "admin.products.size.create"
                            ]
                        ]
                    ],
                    "Brand" => [
                        "scope" => ["admin.products.brand.index"],
                        "links" => [
                            [
                                "title" => "List",
                                "route" => "admin.products.brand.index",
                                "scope" => "admin.products.brand.index"
                            ],
                            [
                                "title" => "Add",
                                "route" => "admin.products.brand.create",
                                "scope" => "admin.products.brand.create"
                            ]
                        ]
                    ],
                    
                ],
            ],

            "Users" => [

                "base" => "admin.users",

                "icon" => icon("users_svg"),
                "scope" => ["admin.users.roles.index", "admin.users.roles.create", "admin.users.users.index", "admin.users.users.create"],

                "menus" => [
                    "Roles" => [

                        "scope" => ["admin.users.roles.index", "admin.users.roles.create"],

                        "links" => [
                            [
                                "title" => "List",
                                "route" => "admin.users.roles.index",
                                "scope" => "admin.users.roles.index"
                            ],
                            // [
                            //     "title" => "Add",
                            //     "route" => "admin.users.roles.create",
                            //     "scope" => "admin.users.roles.create"
                            // ]
                        ]
                    ],
                    "Users" => [

                        "scope" => ["admin.users.users.index", "admin.users.users.create"],

                        "links" => [
                            [
                                "title" => "List",
                                "route" => "admin.users.users.index",
                                "scope" => "admin.users.users.index"
                            ],
                            [
                                "title" => "Add",
                                "route" => "admin.users.users.create",
                                "scope" => "admin.users.users.create"
                            ]
                        ]
                    ],
                ]
            ],

        ],

        /*"Configuration" => [

            "Settings" => [

                "base" => "admin.settings",

                "icon" => icon("setting_svg"),

                "scope" => ["admin.settings.configurations.index", "admin.settings.shortcode.index", "admin.settings.shortcode.create",
                    "admin.settings.black-list.index", "admin.settings.black-list.create",
                    "admin.settings.activity-log.index"],

                "menus" => [
                    "Website Setting" => [
                        "scope" => ["admin.settings.configurations.index"],
                        "links" => [
                            [
                                "title" => "Configuration",
                                "route" => "admin.settings.configurations.index",
                                "scope" => "admin.settings.configurations.index"
                            ]
                        ]
                    ],

                    "Short Codes" => [
                        "scope" => ["admin.settings.shortcode.index", "admin.settings.shortcode.create"],
                        "links" => [
                            [
                                "title" => "List",
                                "route" => "admin.settings.shortcode.index",
                                "scope" => "admin.settings.shortcode.index"
                            ],
                            [
                                "title" => "Add",
                                "route" => "admin.settings.shortcode.create",
                                "scope" => "admin.settings.shortcode.create"
                            ]
                        ]
                    ],

                    "Black List" => [
                        "scope" => ["admin.settings.black-list.index", "admin.settings.black-list.create"],
                        "links" => [
                            [
                                "title" => "List",
                                "route" => "admin.settings.black-list.index",
                                "scope" => "admin.settings.black-list.index"
                            ],
                            [
                                "title" => "Add",
                                "route" => "admin.settings.black-list.create",
                                "scope" => "admin.settings.black-list.create"
                            ]
                        ]
                    ],
                    "Activity Log" => [
                        "scope" => ["admin.settings.activity-log.index"],
                        "links" => [
                            [
                                "title" => "List",
                                "route" => "admin.settings.activity-log.index",
                                "scope" => "admin.settings.activity-log.index"
                            ]
                        ]
                    ],
                ]


            ]
        ]*/

    ]

];

?>
