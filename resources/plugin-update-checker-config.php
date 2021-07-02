<?php
/**
* Plugin updater configuration code
*/

/**
GitHub Plugin updater configuration code
 */
$plugin_slug = 'soes-api-protection';
$github_user_name = 'hegemanjr';
$stable_branch = 'master';
//$github_access_token = '';
$main_plugin_file = dirname(dirname(__FILE__)).'/'.$plugin_slug.'.php';
$puc_location = plugin_dir_path(__FILE__) .'plugin-update-checker/plugin-update-checker.php';

require_once $puc_location;

$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/' . $github_user_name . '/' .$plugin_slug,
	$main_plugin_file,
	$plugin_slug
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch($stable_branch);

//Optional: If you're using a private repository, specify the access token like this:
//$myUpdateChecker->setAuthentication($github_access_token);
