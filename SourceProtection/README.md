## SourceProtection

Removes View Source tab and (if pageForms is installed the edit-Form tab) & History tab from menu and disable action=edit function for users with no edit permissions.
It will also block the viewing of the readonly form.

### Compatibility

* PHP 5.4+
* MediaWiki 1.23+


### Installation

(1) Extract the files in a directory called `SourceProtection` in your `extensions/` folder.

(2) Add the following code at the bottom of your "LocalSettings.php" file:
```
require_once "$IP/extensions/sourceProtection/SourceProtection.php";
```
(3) Go to "Special:Version" on your wiki to verify that the extension is successfully installed.

(4) Done.


### Configuration

There is no need for additional configuration
