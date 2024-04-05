
<?php

function uxp_create_table(){


   global $wpdb;
   global $jal_db_version;

    $wpdb->query("DROP TABLE IF EXISTS state_translations"); 
    $wpdb->query("DROP TABLE IF EXISTS state");
    $wpdb->query("DROP TABLE IF EXISTS country_translations");
    $wpdb->query("DROP TABLE IF EXISTS country");

   $charset_collate = $wpdb->get_charset_collate();

       $sqle = "CREATE TABLE country (
       id int(10) unsigned NOT NULL AUTO_INCREMENT, 
       country_code varchar(255) DEFAULT '' NOT NULL, 
       PRIMARY KEY  (id)
        ) $charset_collate;";
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $sqle );

        $sql = "CREATE TABLE country_translations (
            id int(10) unsigned NOT NULL AUTO_INCREMENT, 
            country_id int(10) unsigned NOT NULL, 
            label text,
            language_code varchar(2) DEFAULT '' NOT NULL, 
            PRIMARY KEY (id),
            CONSTRAINT `fk_country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
            ) $charset_collate;";
            
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $sql );
 
        $sql2 = "CREATE TABLE state (
            id int(10) unsigned NOT NULL AUTO_INCREMENT, 
            province_code varchar(255) DEFAULT '' NOT NULL, 
            country_id int(10) unsigned,
            PRIMARY KEY (id)
             ) $charset_collate;";
             require_once ABSPATH . 'wp-admin/includes/upgrade.php';
             dbDelta( $sql2 );
             
        $sql3 = "CREATE TABLE state_translations (
            id int(10) unsigned NOT NULL AUTO_INCREMENT, 
            state_id int(10) unsigned NOT NULL, 
            label text ,
            language_code varchar(2) DEFAULT '' NOT NULL, 
            PRIMARY KEY (id), 
            CONSTRAINT `fk_state_id` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`)
            ) $charset_collate;";
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $sql3 );


    $wpdb->query("INSERT INTO country
            ( id, country_code)
            VALUES
              (1, 'CA'),
              (244, 'US')");

    $wpdb->query("INSERT INTO country_translations
            (id, country_id, label, language_code)
            VALUES (1, 1, 'Canada', 'fr'), 
                   (245, 244, 'United States', 'en')");
    
   
    $wpdb->query("INSERT INTO state
    (id, province_code, country_id) 
    VALUES 
     (1, 'AB', 1),
     (2, 'BC', 1),
     (3, 'MB', 1),
     (4, 'NB', 1),
     (5, 'NL', 1),
     (6, 'NS', 1),
     (7, 'NT', 1),
     (8, 'NU', 1),
     (9, 'ON', 1),
     (10, 'PE', 1),
     (11, 'QC', 1),
     (12, 'SK', 1),
     (13, 'YT', 1),
     (14, 'AK', 244),
     (15, 'AR', 244),
     (16, 'AS', 244),
     (17, 'AZ', 244),
     (18, 'CA', 244),
     (19, 'CO', 244),
     (20, 'CT', 244),
     (21, 'DC', 244),
     (22, 'DE', 244),
     (23, 'FL', 244),
     (24, 'FM', 244),
     (25, 'GA', 244),
     (26, 'GU', 244),
     (27, 'HI', 244),
     (28, 'IA', 244),
     (29, 'ID', 244),
     (30, 'IL', 244),
     (31, 'IN', 244),
     (32, 'KS', 244),
     (33, 'KY', 244),
     (34, 'LA', 244),
     (35, 'MA', 244),
     (36, 'MD', 244),
     (37, 'ME', 244),
     (38, 'MH', 244),
     (39, 'MI', 244),
     (40, 'MN', 244),
     (41, 'MO', 244),
     (42, 'MP', 244),
     (43, 'MS', 244),
     (44, 'MT', 244),
     (45, 'NC', 244),
     (46, 'ND', 244),
     (47, 'NE', 244),
     (48, 'NH', 244),
     (49, 'NJ', 244),
     (50, 'NM', 244),
     (51, 'NV', 244),
     (52, 'NY', 244),
     (53, 'OH', 244),
     (54, 'OK', 244),
     (55, 'OR', 244),
     (56, 'PA', 244),
     (57, 'PR', 244),
     (58, 'PW', 244),
     (59, 'RI', 244),
     (60, 'SC', 244),
     (61, 'SD', 244),
     (62, 'TN', 244),
     (63, 'TX', 244),
     (64, 'UT', 244),
     (65, 'VA', 244),
     (66, 'VI', 244),
     (67, 'VT', 244),
     (68, 'WA', 244),
     (69, 'WI', 244),
     (70, 'WV', 244),
     (71, 'WY', 244),
     (72, 'AL', 244)");
     

    $wpdb->query("INSERT INTO state_translations 
    (id, state_id, label, language_code) 
    VALUES 
    -- (1, 1, 'Alberta', 'fr'),
    -- (2, 2, 'Colombie-Britannique', 'fr'),
    (1, 1, 'Alberta', 'en'),
    (2, 2, 'British Columbia', 'en'),
    (3, 3, 'Manitoba', 'en'),
    (4, 4, 'New Brunswick', 'en'),
    (5, 5, 'Newfoundland and Labrador', 'en'),
    (6, 6, 'Nova Scotia', 'en'),
    (7, 7, 'Northwest Territories', 'en'),
    (8, 8, 'Nunavut', 'en'),
    (9, 9, 'Ontario', 'en'),
    (10, 10, 'Prince Edward Island', 'en'),
    (11, 11, 'Quebec', 'en'),
    (12, 12, 'Saskatchewan', 'en'),
    (13, 13, 'Yukon', 'en'),
    (14, 14, 'Alaska', 'en'),
    (15, 15, 'Arkansas', 'en'),
    (16, 16, 'American Samoa', 'en'),
    (17, 17, 'Arizona', 'en'),
    (18, 18, 'California', 'en'),
    (19, 19, 'Colorado', 'en'),
    (20, 20, 'Connecticut', 'en'),
    (21, 21, 'District Of Columbia', 'en'),
    (22, 22, 'Delaware', 'en'),
    (23, 23, 'Florida', 'en'),
    (24, 24, 'Federated States Of Micronesia', 'en'),
    (25, 25, 'Georgia', 'en'),
    (26, 26, 'Guam GU', 'en'),
    (27, 27, 'Hawaii', 'en'),
    (28, 28, 'Iowa', 'en'),
    (29, 29, 'Idaho', 'en'),
    (30, 30, 'Illinois', 'en'),
    (31, 31, 'Indiana', 'en'),
    (32, 32, 'Kansas', 'en'),
    (33, 33, 'Kentucky', 'en'),
    (34, 34, 'Louisiana', 'en'),
    (35, 35, 'Massachusetts', 'en'),
    (36, 36, 'Maryland', 'en'),
    (37, 37, 'Maine', 'en'),
    (38, 38, 'Marshall Islands', 'en'),
    (39, 39, 'Michigan', 'en'),
    (40, 40, 'Minnesota', 'en'),
    (41, 41, 'Missouri', 'en'),
    (42, 42, 'Northern Mariana Islands', 'en'),
    (43, 43, 'Mississippi', 'en'),
    (44, 44, 'Montana', 'en'),
    (45, 45, 'North Carolina', 'en'),
    (46, 46, 'North Dakota', 'en'),
    (47, 47, 'Nebraska', 'en'),
    (48, 48, 'New Hampshire', 'en'),
    (49, 49, 'New Jersey', 'en'),
    (50, 50, 'New Mexico', 'en'),
    (51, 51, 'Nevada', 'en'),
    (52, 52, 'New York', 'en'),
    (53, 53, 'Ohio', 'en'),
    (54, 54, 'Oklahoma', 'en'),
    (55, 55, 'Oregon', 'en'),
    (56, 56, 'Pennsylvania', 'en'),
    (57, 57, 'Puerto Rico', 'en'),
    (58, 58, 'Palau', 'en'),
    (59, 59, 'Rhode Island', 'en'),
    (60, 60, 'South Carolina', 'en'),
    (61, 61, 'South Dakota', 'en'),
    (62, 62, 'Tennessee', 'en'),
    (63, 63, 'Texas', 'en'),
    (64, 64, 'Utah', 'en'),
    (65, 65, 'Virginia', 'en'),
    (66, 66, 'Virgin Islands', 'en'),
    (67, 67, 'Vermont', 'en'),
    (68, 68, 'Washington', 'en'),
    (69, 69, 'Wisconsin', 'en'),
    (70, 70, 'West Virginia', 'en'),
    (71, 71, 'Wyoming', 'en'),
    (72, 72, 'Alabama', 'en')
    -- (75, 3, 'Manitoba', 'fr'),
    -- (76, 4, 'Nouveau-Brunswick', 'fr'),
    -- (77, 5, 'Terre-Neuve-et-Labrador', 'fr'),
    -- (78, 6, 'Nouvelle-Écosse', 'fr'),
    -- (79, 7, 'Territoires du Nord-Ouest', 'fr'),
    -- (80, 8, 'Nunavut', 'fr'),
    -- (81, 9, 'Ontario', 'fr'),
    -- (82, 10, 'Île du Prince-Édouard', 'fr'),
    -- (83, 11, 'Québec', 'fr'),
    -- (84, 12, 'Saskatchewan', 'fr'),
    -- (85, 13, 'Yukon', 'fr')
    ");
        
}
function ux_select_all($table) {
	global $wpdb;

	$result = $wpdb->get_results ("SELECT * FROM $table ");

	return $result; 
	
}

function ux_select_unique($table, $id) {
	global $wpdb;

	$result = $wpdb->get_results ("SELECT * FROM $table WHERE id = '$id' ");

	return $result; 
	
}


function ux_select_all_country($country_id) {
	global $wpdb;

	$result = $wpdb->get_results ( "SELECT * FROM state_translations
    INNER JOIN state ON state_translations.id = state.id WHERE state.country_id = $country_id"); 
	return $result; 
	
}