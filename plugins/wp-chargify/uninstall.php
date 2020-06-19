<?php
namespace Chargify\Uninstall;
use Chargify\Admin\Helpers;

# Delete the Chargify settings when the plugin is uninstalled.
Helpers\delete_settings();
