<?php
return  [
    'validate' => [
        'properties' => [
            'email' => 'required',
            'contact_no' => 'required',
            'line_id' => 'required',
            'fax_no' => 'required',
            'no_listed_properties' => 'required',
            'company_name' => 'required',
            'hb_license_no' => 'required',
            'registered_members' => 'required',
            'comment_pr' => 'required',
            // 'comment_priority' => 'required',
            // 'convey_message' => 'required',
            // 'photo_path' => 'required',
            // 'photo_file' => 'required',
            // 'price' => 'required',
            // 'capacity' => 'required',
            // 'is_home_page' => 'required',
            // 'home_page_url' => 'required',
            // 'is_send_alert' => 'required',
            // 'items_printed' => 'required',
            // 'google_location' => 'required',
            'postal_code' => 'required',
            // 'location' => 'required',
            'address' => 'required',
        ],
        'company' => [
            'license_no' => 'required',
            'company_name' => 'required',
            'telephone_no' => 'required',
            'prefecture' => 'required',
            'person_in_charge' => 'required',
            'email' => 'required',
            'considerations' => 'required',
        ],

        'contacts' => [
            // 'license' => 'required',
            'company_name' => 'required',
            //'tel' => 'required',
            //'prefecture' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required',
            'body' => 'required',
        ],

        'distributions' => [
            'login_id' => 'required',
            'password' => 'required',


        ],

        'request_informations' => [
            //'license' => 'required',
            'company_name' => 'required',
            // 'tel' => 'required',
            //'prefecture' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required',
            'inquiry' => 'required',
            // 'status1' => 'required',
        ],

        'headquarter' => [
            'company_name' => 'required',
            'address' => 'required',
            'tel' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'payment_method' => 'required',
        ],

        'register_company' => [
            'license_slct' => 'required',
            'license_number_2' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'contract_number' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'usage_plan' => 'required',
            'payment_method' => 'required',
        ],

        'guide' => [
            'guide_name' => 'required',
            'guide_place' => 'required',
            'guide_body' => 'required',
        ]
    ],

];
