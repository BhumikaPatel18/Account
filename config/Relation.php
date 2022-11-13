
<?php

    return[


        'Account'=>[
                    'Contact'=>[
                        'table_name'=>'account_contact',
                        'relationship'=>'many to many',
                        'relationship_name'=>'contacts',
                        'relationship_id'=>'contact_id',
                        ],
                        'Project'=>[
                            'table_name'=>'account_project',
                            'relationship'=>'many to many',
                            'relationship_name'=>'projects',
                            'relationship_id'=>'project_id',
                        ],
                ],

                'Contact'=>[
                    'Account'=>[
                        'table_name'=>'account_contact',
                        'relationship'=>'many to many',
                        'relationship_name'=>'accounts',
                        'relationship_id'=>'account_id',
                    ],
                ],

                    'User'=>[
                        'Project'=>[
                            'table_name'=>'user_project',
                            'relationship'=>'many to many',
                            'relationship_name'=>'projects',
                            'relationship_id'=>'project_id',
                        ],
                     ],

                        'Project'=>[
                            'User'=>[
                                'table_name'=>'user_project',
                                'relationship'=>'many to many',
                                'relationship_name'=>'users',
                                'relationship_id'=>'user_id',
                            ],
                            'Account'=>[
                                'table_name'=>'account_project',
                                'relationship'=>'many to many',
                                'relationship_name'=>'accounts',
                                'relationship_id'=>'account_id',
                            ],
                        ],
    ];

