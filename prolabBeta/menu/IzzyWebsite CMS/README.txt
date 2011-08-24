===============================================================================
	How to install this menu in IZZY Website CMS
===============================================================================


This menu is ready to use it with your IzzyWebsite system. 
It's very easy to add it to your template, and menu will be dynamic 
- when you add new page in your admin, it will be displayed on your website automatically.



If you don't have IzzyWebsite (http://www.IzzyWebsite.com) yet,
you can use this Free Trial activation code: BF77-EAA1-5663F61-TRIAL

Installation place: 
http://install.izzywebsite.com/?kc=BF77-EAA1-5663F61-TRIAL

(Izzy will be installed & configured automatically on your webhosting account)


==================

Menu Installation:

1. 	Upload "inc/chrome.php" file to your "inc" folder. You should backup old file.

2. 	Upload "editor_images/custom_menu.css" file to "editor_images" folder

3. 	Edit your template now, use this code:
	(If you want to use DHTML submenu style only, skip this step)

==================

<div id="MainMenu">
 <div id="tab">
  <ul>
   {%menu_start=1%}<li {%menu_ActiveClass%}><a href="{%menu_href%}"><span>{%menu_display%}</span></a></li>{%menu_end=1%}
  </ul>
 </div>
</div>

==================





This is it! Thanks for using IzzyWebsite!


===============================================================================