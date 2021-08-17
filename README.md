# Primary-Category
Contributors: Mirko Viviano  
Tags: category, primary category, categories, posts, pages, articles  
Requires at least: 3.0.1  
Tested up to: 5.8  
Stable tag: 5.8  
License: GPLv2 or later  
License URI: http://www.gnu.org/licenses/gpl-2.0.html  
 
## Background
Many publishers use categories as a means to logically organize their content. However, many pieces of content have more than one category. Sometimes it’s useful to designate a primary category for posts (and custom post types). On the front-end, we need the ability to query for posts (and custom post types) based on their primary categories.

## Your Mission
Create a WordPress plugin that allows publishers to designate a primary category for posts. We’ve intentionally left implementation details out so you have a chance to show us strategic thinking. 

## Installation
To install the plugin you can
* Download this repo as a .zip file and upload it on your WordPress website
* Upload the whole `primary-category` folder to the `/wp-content/plugins/` directory of your WordPress website

## Functionalities
The plugin allows users to
* Select a category as the primary category from the list of posts categories
* Select a template to render the posts wherever on the website

## Shortcode usage
`[posts-primary-category category="xxx" template="xxx" columns="xxx"]`  
Shortcode parameters  
`category` – The posts category to render. Defaults to `homepage_articles`.  
`template` – The template to render. Defaults to `simple`.  
`columns` – The number of columns to display. Defaults to `4`.  

## Deployed application
The deployed plugin can be found at 
[http://54.36.163.35/sage/](http://54.36.163.35/sage/)

## Time Tracking
The proper development started on Monday 16th August 2021. The plugin has been considered finished on Tuesday 17th August 2021. The total time needed to develop such plugin has been of approximately 10 hours. 

