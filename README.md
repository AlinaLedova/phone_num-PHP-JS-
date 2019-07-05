# phone_num
Just tooltips of phone country codes for website [PHP+JS]

# how to use

**File index.php in root - just example of using and don't need for working "phone_num", 
but you can use this for more comfortable installing in your website. Before use "phone_num" rename
this index.php-file to avoid replacing files or similar problems.**

1. Copy folder `phone_num` and put it beside the file where you want use this add-on;
2. Open the page where you want to use this, and include `phone_num.php` file inside `<head>` of your page (*I use in index.php like example `<?php  require_once 'phone_num/phone_num.php'; ?>`*);
3. Write the `echo` of the variable `$headTags` in `<head>` of your page. This need for connection scripts and styles. (*`<?php echo $headTags; ?>`*);
4. In a place of your page, where you want to see "phone_num" widget write the `echo` of the variable `$phoneNumWidget`. (*`<?php echo $phoneNumWidget; ?>`*);

*For using settings after installing go to `directory_with_add_on/phone_num/index.php`*

# Troubles 

- block with tooltips have relative position. When you use tooltips, block will change sizes... In work :)
