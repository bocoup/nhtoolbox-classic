# NH Toolbox Classic Theme

A custom theme that utilizes the classic editor.

# Overview
## Assets
This is where all assets of different types live. Any additions will need to be enqueued for use similar in pattern to the `enqueue-scripts.php` and `eneueue-styles.php` files within the classes folder.

## Classes
This is where all custom logic lives for this theme. Here you will find the custom meta fields that are used in the post types that weren't available within the ACF editor. As well as, general logic that is being used in the `functions.php` file.

## Template-Parts
Similar to framework components, these are different pieces of the pages that are created. These pieces are then called on the page themselves.
## Page Files

### 404.hp
This is the template for the 404 page.

### footer.php
This is the template for the footer.

### functions.php
This is where all functionality must be called for it to be utilized within this theme.

### header.php
This is a template for the header/navbar.

### index.php
This is a template for the index page.

### page.php
This is a template for any page.

### single.php
This is a template for the strategies post type.

## Plugins
## Custom Post Type UI
This plugin is where you will need to register the `case-study` custom post type.

You can either create them manually, or import them with the `case-study.json` file in the `imports` folder.

## Advanced Custom Fields
This plugin is where you will need to create extra form fields for the strategies and case studies.

You can either create them manually, or import them with the `acf-fields.json` file in the `imports` folder.


## Important notes
- any new menu item will need the `navbar-item` class added to it in the menu section within the `wp-admin` menu section.