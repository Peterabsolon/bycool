<?php
// Heading
$_['heading_title']        				= 'OpenBay Pro';

// Buttons
$_['button_retry']						= 'Ismét';
$_['button_update']						= 'Frissít';
$_['button_patch']						= 'Patch';
$_['button_ftp_test']					= 'Próbakapcsolat';
$_['button_faq']						= 'Tekintsd nmeg a GYIK témákat';

// Tab
$_['tab_setting']						= 'Bellítások';
$_['tab_update']						= 'Frissítések';
$_['tab_update_v1']						= 'Easy updater';
$_['tab_update_v2']						= 'Legacy updater';
$_['tab_patch']							= 'Patch';
$_['tab_developer']						= 'Fejlesztő';

// Text
$_['text_dashboard']         			= 'Dashboard';
$_['text_success']         				= 'Kész! A módosítás sikeresen megtörtént!';
$_['text_products']          			= 'Tételek';
$_['text_orders']          				= 'Rendelések';
$_['text_manage']          				= 'Módosít';
$_['text_help']                     	= 'Súgó';
$_['text_tutorials']                    = 'Tanácsadás';
$_['text_suggestions']                  = 'Javaslatok';
$_['text_version_latest']               = 'A legújabb verzió van használatban';
$_['text_version_check']     			= 'Legújabb verzió ellenőrzése';
$_['text_version_installed']    		= 'Telepített OpenBay Pro verzió: v';
$_['text_version_current']        		= 'Telepített verzió is';
$_['text_version_available']        	= 'A legújabb';
$_['text_language']             		= 'API válasznyelv';
$_['text_getting_messages']     		= 'Szerezd meg a OpenBay Pro üzeneteket';
$_['text_complete']     				= 'Kész';
$_['text_test_connection']              = 'Teszt FTP kapcsolat';
$_['text_run_update']           		= 'Frissítés futtatása';
$_['text_patch_complete']           	= 'Patch alkalmazva';
$_['text_connection_ok']				= 'Kapcsolat létrejött. OpenCart mappa megtalálva';
$_['text_updated']						= 'Modul frissítve (v.%s)';
$_['text_update_description']			= 'The update tool will make changes to your shop file system. Make sure you have a complete file and database backup before updating.';
$_['text_patch_description']			= 'A frissítőeszköz meg fogja változtatni a webshop fájlrendszerét. Készíts mielőbb egy biztonsági mentés a webshopról mielőtt az eszközt használnád!';
$_['text_clear_faq']                    = 'Felugró FAQ ablakok törlése';
$_['text_clear_faq_complete']           = 'Értesítéseket mutasd újra';
$_['text_install_success']              = 'Piactér sikeresen telepítve';
$_['text_uninstall_success']            = 'Piactér sikeresen törölve';
$_['text_title_messages']               = 'Üzenetek';
$_['text_marketplace_shipped']			= 'A piactér rendelés állapota elküldöttre változtatása.';
$_['text_action_warning']				= 'This action is dangerous so is password protected.';
$_['text_check_new']					= 'Checking for newer version';
$_['text_downloading']					= 'Downloading update files';
$_['text_extracting']					= 'Extracting files';
$_['text_running_patch']				= 'Running patch files';
$_['text_fail_patch']					= 'Unable to extract update files';
$_['text_updated_ok']					= 'Update complete, installed version is now ';
$_['text_check_server']					= 'Checking server requirements';
$_['text_version_ok']					= 'Software is already up to date, installed version is ';
$_['text_remove_files']					= 'Removing files no longer required';
$_['text_confirm_backup']				= 'Ensure that you have a full backup before continuing';

// Column
$_['column_name']          				= 'Bővítmény neve';
$_['column_status']        				= 'Állapot';
$_['column_action']        				= 'Művelet';

// Entry
$_['entry_patch']            			= 'Javítás kézi frissítése';
$_['entry_ftp_username']				= 'FTP Felhasználónév';
$_['entry_ftp_password']				= 'FTP Jelszó';
$_['entry_ftp_server']					= 'FTP szerver címe';
$_['entry_ftp_root']					= 'FTP szerver admin címe';
$_['entry_ftp_admin']            		= 'Admin mappa';
$_['entry_ftp_pasv']                    = 'PASV mód';
$_['entry_ftp_beta']             		= 'Béta verzió használata';
$_['entry_courier']						= 'Futár';
$_['entry_courier_other']           	= 'További futár';
$_['entry_tracking']                	= 'Küldemény azonosító #';
$_['entry_empty_data']					= 'Empty store data?';
$_['entry_password_prompt']				= 'Please enter the data wipe password';
$_['entry_update']						= 'Easy 1 click update';

// Error
$_['error_username']             		= 'FTP felhasználónév szükséges';
$_['error_password']             		= 'FTP jelszó szükséges';
$_['error_server']               		= 'FTP szerver szükséges';
$_['error_admin']             			= 'Admin cím szükséges';
$_['error_no_admin']					= 'Kapcsolat rendben, de a OpenCart admin mappa nem található';
$_['error_no_files']					= 'Kapcsolat rendben, de OpenCart mappa nem található! Az adminmappa rendben van?';
$_['error_ftp_login']					= 'A felhasználónak nincs hozzáfáráse';
$_['error_ftp_connect']					= 'Nincs kapcsolat a szerverrel';
$_['error_failed']						= 'Az adatokat nem lehet betölteni, megpróbálod még egyszer?';
$_['error_tracking_id_format']			= 'Küldemény azonosító nem tartalmazhat > vagy < karaktereket';
$_['error_tracking_courier']			= 'Küldemény azonosítóhoz először ki kell választanod egy futárt.';
$_['error_tracking_custom']				= 'A futár meződ hagyd üresen amennyiben külön futárcéget kívánsz megjelölni';
$_['error_permission']					= 'Ácsi, nincs jogosultságod ehhez a művelethez!';
$_['error_mkdir']						= 'PHP mkdir function is disabled, contact your host';
$_['error_file_delete']					= 'Unable to remove these files, you should delete them manually';
$_['error_mcrypt']            			= 'PHP function "mcrypt_encrypt" is not enabled. Contact your hosting provider.';
$_['error_mbstring']               		= 'PHP library "mb strings" is not enabled. Contact your hosting provider.';
$_['error_ftpconnect']             		= 'PHP FTP functions are not enabled. Contact your hosting provider.';
$_['error_oc_version']             		= 'Your version of OpenCart is not tested to work with this module. You may experience problems.';
$_['error_fopen']             			= 'PHP function "fopen" is disabled by your host - you will be unable to import images when importing products';

// Help
$_['help_ftp_username']           		= 'FTP felhasználónév a kapcsolat létrehozásához.';
$_['help_ftp_password']           		= 'FTP  jelszó a kapcsolat létrehozásához.';
$_['help_ftp_server']      				= 'IP cím vagy domain név a FTP szerverhez';
$_['help_ftp_root']           			= '(ne használj előtagot pl.:httpdocs/www)';
$_['help_ftp_admin']               		= 'Ha módosítottad az admin mappát, az új nevet itt ad meg';
$_['help_ftp_pasv']                    	= 'FTP kapcsolat alkalmazása passzív módban';
$_['help_ftp_beta']             		= 'Figyelem, A Béta verzió nem működik megfelelően!';
$_['help_clear_faq']					= 'Show all of the help notifications again';
$_['help_empty_data']					= 'This can cause serious damage, do not use it if you do not know what it does!';
$_['help_easy_update']					= 'Click update to install the latest version of OpenBay Pro automatically';
$_['help_patch']						= 'Ha FTP-ról frissítetted a fájlokat, futtasd le patch fájlt a befejezéshez';