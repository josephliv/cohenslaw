=== Frontend Admin - Add and edit posts, pages, users and more all from the frontend ===
Contributors: shabti, jacoblevitan
Tags: frontend posting, frontend editing
Requires at least: 4.6
Tested up to: 5.8.1
Stable tag: 3.3.37
Requires PHP: 5.6.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This awesome plugin allows you to easily display frontend admin forms on your site so your clients can easily edit content by themselves from the frontend.

== Description ==

This awesome plugin allows you to easily display frontend admin forms on your site so your clients can easily edit content by themselves from the frontend. You can create awesome forms with our form builder to allow users to save custom meta data to pages, posts, users, and more. Then use our Gutenberg block or shortcode to easily display the form for your users.  

So, what can this plugin do for you?

== FREE Features ==

1. No Coding Required
Give the end user the best content managment experience without having to know code. It’s all ready to go right here. 

2. Edit Posts 
Let your users edit posts from the frontend of their site without having to access the WordPress dashboard. 

3. Add Posts 
Let your users publish new posts from the frontend using the “new post” widget

4. Delete Posts 
Let your users delete or trash posts from the frontend using the “trash button” widget

5. Edit User Profile
Allow users to edit their user data easily from the frontend.

6. User Registration Form
Allow new users to register to your site with a built in user registration form! You can even hide the WordPress dashboard from these new users.

7. Hide Admin Area 
Pick and chose which users have acess to the WordPress admin area.

8. Configure Permissions
Choose who sees your form based on user role or by specific users.

9. Modal Popup 
Display the form in a modal window that opens when clicking a button so that it won’t take up any space on your pages.


== PRO Features ==

1. Edit Global Options 
If you have global data – like header and footer data – let your users edit it all from the frontend.

2. Limit Submits
Prevent all or specific users from submitting the form more than a number of times.

3. Send Emails 
Set emails to be sent and map the ACF form data to display in the email fields such as the email address, the from address, subject, and message. 

4. Style Tab
Use Elementor to style the form and as well the buttons. 

5. Multi Step Forms 
Make your forms more engaging by adding multiple steps.

6. Stripe and Paypal 
Accept payments through Stripe or Paypal upon form submission. 

7. Woocommerce Intergration 
Easily add Woocomerce products from the frontend.
 

Purchase your copy here at the official website: [Frontend Admin website](https://www.frontendadmin.com/)


== Useful Links ==
Appreciate what we're doing? Want to stay updated with new features? Give us a like and follow us on our facebook page: 
[Frontend Admin Facebook page](https://www.facebook.com/frontendadmin/)

The Pro version has even more cool features. Check it out at the official website:
[Frontend Admin website](https://www.frontendadmin.com/)

Check out our other plugin, which let's you dynamically query your posts more easily: 
[Advanced Post Queries for Elementor](https://wordpress.org/plugins/advanced-post-queries/)


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/frontend-admin` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Create a form under Frontend Admin > forms.
4. Choose the desired form type. 
5. Configure the fields permisions, display, and other settings as you please.
6. Copy and paste the shortcode on any page. You can also use our Gutenberg block.
7. You should now see a form on the frontend for editing a post, adding a post, editing or adding a user, and more.


== Tutorials ==  

== Tutorials ==  

= Installating Frontend Admin =
https://youtu.be/ZR7UAegiljQ

== Frequently Asked Questions ==

= Can I send emails through this form? =

You can use a "action hook" to send emails when this form is registered: <a href="https://www.frontendadmin.com/frontend_admin/save_post/">frontend_admin/save_post</a>

If you purchase our pro version, you will be able to configure this from the widget without any code. You will be able to send any number of emails upon form submission. 

= Can I let users set post categories through this form? =

Yes. Simply add a taxonomy field and set the taxonomy type to Category


== Screenshots ==

1. The New Post Form widget enables users to add new posts to a custom or WordPress standard post type from the frontend of a WordPress website, without needing to interact with the WordPress dashboard. The page to host the form is built in Elementor. Important: By default a user needs to be logged in and carry the “administrator” role to add a post. This can be changed, however, in the Permissions settings of this widget.
2. The Field Type defines the type of field being edited. Changing this will affect the other available options. All the field types have options which can be changed to customize both the content and the style of the field. 
3. Here we have several options for additional actions to take place outside the form itself. You can define where the page should redirect to after submitting. By default it will reload the current Page/Post. We can choose to redirect to the live post by selecting Custom URL. You can also define a custom success message, or choose no success message, whatever suits your needs.
4. This is where we limit which kinds of users can access the form. It is very important to configure this correctly, as otherwise your users might not be able to see the form at all! By default, only administrators can see the form. If you want to allow other users to access it, you need to add them. You can choose Roles under the Select By Role option, or add specific users under the Select By User option.
5. The Edit Post Form widget enables users to edit existing posts from the frontend of a WordPress website, without needing to interact with the WordPress dashboard.


== Changelog ==
= 3.3.37 - 09-03-2022 =
 * Fixed image field's browser upload
 * Fixed color picker and time picker breaking in multi step 
 * Added filter to prevent submissions from saving

= 3.3.36 - 08-03-2022 =
 * Added multi step feature to admin form builder
 
= 3.3.35 - 04-03-2022 =
 * Fixed file and image based fields breaking when button text changed 

= 3.3.34 - 03-03-2022 =
 * Fixed addon installer

= 3.3.33 - 28-02-2022 =
 * Updated Freemius SDK

= 3.3.32 - 22-02-2022 =
 * Fixed product author field
 * Fixed dynamic permissions option in edit button widget
 * Fixed ACF fields not showing up within a group field
 * Fixed JS not working after first step in multi step
 * Fixed required mark not showing up after first step

= 3.3.31 - 21-02-2022 =
 * Fixed column field
 * Fixed shipping attributes error
 * Added user role options to admin form builder
 * Added validation to user role field

= 3.3.30 - 17-02-2022 =
 * Fixed delete button icons not showing

= 3.3.29 - 16-02-2022 =
 * Fixed default colors for the delete button 
 * Fixed woocommerce shiping fields not showing up and not saving correctly
 
= 3.3.28 - 10-02-2022 =
 * Fixed submission approval to edit data rather than add new data
 * Localized strings used in js files

= 3.3.27 - 10-02-2022 =
 * Fixed multi step validation error

= 3.3.26 - 06-02-2022 =
 * Fixed conflict with multi step form and repeater fields

= 3.3.25 - 27-01-2022 =
 * Fixed bug in woo delete product button

= 3.3.24 - 27-01-2022 =
 * Fixed bug in woo attributes field

= 3.3.23 - 25-01-2022 =
 * Fixed js error 'otherSteps undefined'
 * Moved plugin folder into "main" for development purposes
 * Restored missing submit button wrapper with class of "fea-submit-buttons"
  * Fixed submit button floating to top right of the form when field widths are less than 100%
 * Fixed local avatar setting
 * Fixed conditional logic not working across multiple steps

= 3.3.22 - 24-01-2022 =
 * Added [post:author] shortcode to dynamic tags on form submit
 * Fixed multi step validating fields in upcoming steps
 * Fixed setcookie being called after headers are sent
 * Replaced tutorial video

= 3.3.20 - 21-01-2022 =
 * Fixed review option not opening review page

= 3.3.19 - 20-01-2022 =
 * Added submit button styling options in Oxygen integration
 * Fixed missing fields in multi step form
 * Fixed Elementor styles for delete button
 * Fixed styles for labels applying to checkbox labels as well
 
= 3.3.18 - 19-01-2022 =
 * Fixed missing fields issues 
 * Fixed multi step form navigation issue

= 3.3.17 - 18-01-2022 =
 * Fixed wp uploader not working in modal window
 * Fixed delete button being followed by update button

= 3.3.16 - 17-01-2022 =
 * Fixed form submit button hidden when tabs are used
 * Fixed tab display issue
 * Fixed price field not displaying
 * Fixed url query editing current page if no object id passed in form
 * Added post status and product status as default fields in form builder

= 3.3.15 - 12-01-2022 =
 * Fixed variations field not saving data
 * Fixed post author field not showing options

= 3.3.14 - 10-01-2022 =
 * Fixed error when navigating between steps on multi step form
 * Fixed delete button not redirecting after deleting data
 * Fixed issue when bulk deleting of submissions
 * Fixed form tabs display
 * Fixed email verification sending after each step of multi step form
 * Fixed form title missing
 * Fixed hidden submit button issue
 * Fixed error with missing function in ACF Fields field
 * Improved delete data widgets confirmation message
 * Added Delete Product Widget
 * Added option to show/hide ACF admin page under Frontend Admin > Settings > ACF


= 3.3.13 - 05-01-2022 =
 * Fixed issue with form actions including emails and webhooks
 * Fixed multi step form not navigating to other tabs 
 * Added validation to user email field when "set as username" is active

= 3.3.12 - 30-12-2021 =
 * Fixed missing 'user_regitered' column

= 3.3.11 - 30-12-2021 =
 * Fixed error with user password not saving
 * Optimized process of saving user data in the database
 * Added settings for Attributes, Variations, Download Files fields to form builder

= 3.3.10 - 28-12-2021 =
 * Fixed forms showing on post edit page
 * Fixed new user form not saving data properly, including username and password
 * Fixed form builder presets not working
 * Fixed conflict with Oxygen

= 3.3.9 - 27-12-2021 =
 * Fixed issue with Woocmmerce fields: attributes and variations
 * Fixed conditional logic of Woocommerce fields

= 3.3.8 - 26-12-2021 =
 * Fixed 'undefined' error occuring with uploading images without permissions
 * Improved ux for multi step form

= 3.3.7 - 25-12-2021 =
 * Minified necessary scripts

= 3.3.6 - 22-12-2021 =
 * Fixed multi step form user experience
 * Tabs don't use ajax when "link to step" is enabled

= 3.3.5 - 20-12-2021 =
 * Changed submissions database name

= 3.3.4 - 19-12-2021 =
* Removed link to support forum in wp dashboard

= 3.3.2 - 2021-12-16  =
* included acf pro in pro version

= 3.3.1 - 2021-12-16  =
* Fixed frontend_admin prefix in form shortcode copy button

= 3.3.0 - 2021-12-09  =
* Added request for plugin review after 10 submissions, 100 submissions, and 1000 submissions
* Fixed upgrade notice to dismiss without page reload

= 3.2.17 - 2021-12-08  =
* Fixed submit button field not rendering
* Fixed display name field index error
* Fixed confirm password field showing in submission approvals

= 3.2.16 - 2021-12-08 =
* Added all ACF Frontend features to Frontend Admin.
* Removed dependency on Elementor. Frontend Admin is now a stand alone plugin
* You can now create custom fields with Frontend Admin by using the form builder.
* Frontend Admin users will now benefit from more frequent updates. 
* Fixed conflict with ACF Frontend   

= 2.0.1 - 2020-12-04 =
* Add Product attributes field and product variations field    

= 2.0.0 - 2020-12-04 =
* Fixed bug preventing post title from updating
* Fixed bug preventing Frontend Admin options from updating
* Added Woocommerce Variable product support in pro

= 1.0.6 - 2020-11-01 =
* Fixed bug

= 1.0.5 - 2020-10-28 =
* Pro Release

= 1.0.4 - 2020-10-24 =
* Fixed errors

= 1.0.2 - 2020-10-22 =
* Added dynamic tag to display Frontend Admin custom fields on frontend

= 1.0.1 - 2020-10-21 =
* First Live Version - Enjoy (:


== Upgrade Notice ==





