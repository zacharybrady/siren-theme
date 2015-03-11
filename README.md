siren
==========

# Siren Theme Version 3.6 #
## Suits & Sandals Wordpress Theme Base with Siren Framework v2.00 ##
### by Zachary Brady ###
www.suits-sandals.com

## About ##
The Suits & Sandals team has a habit of making a lot of sites with Wordpress. This theme is design to provide a base for custom Wordpress themes.

Siren is the work horse scaffolding framework of Suits & Sandals, LLC. It strives to provide simple building blocks in order to make starting a project quicker while maintaining best practices. Siren is design to handle a variety of use cases and should be edited to perfectly fit the project at hand. Lastly, this is a living framework that is constantly updated as lessons are learned and discoveries are made.

## Use and Contact Information ##
The Siren Wordpress Theme is free to use in projects as allowed in its MIT license. Feel free to Fork, submit Issues, etc on Github.
You can reach Zachary at zachary@suits-sandals.com for questions regarding the framework, for inqueries about services offered by Suits & Sandals, LLC. , or for job opportunities.

## Philosophy ##
Siren is an extension of its creator's, Zachary Brady, key philosophies in regards to the creation of websites and applications. The core tennants of this philosophy are:

- Performance: A great website MUST be optimized for speed and percieved performance.
- Accessibility: A great site MUST be accessible to all possible users regardless of physical or mental handicap, browser or device usage, or internet connection speed. 
- Progressive Enhancement: Advanced features should not be applied in a way that hinders the basic experience. Websites are a peanut M&M with Semantic HTML5 as the peanut, smartly applied CSS3 as the chocolate, and Javascript/enhanced features as the candy coating.
- Mobile First Responsible Responsive Design: All web projects must adhere to smartly applied responsive design. The base must be the smallest experience with adjustments made through media queries as the browser expands
- Code Cleanliness: Code must be kept clean and logical. Documentation and coding logs must be created alongside the coding process and either kept within the project or linked to.
- Coding Must Be Fun: It just has to be or we'll get bored quickly and our code will suffer for it.

## Dependencies ##
The following list are the dependencies built into Siren.

- Wordpress 4.0+
- PHP 5.0 +
- Grunt 0.4.3 +
    - Default plugins listed in TOC
- SCSS 3.4+
- Compass
- HTML5SHIV
- Boxsizing Polyfill
- loadJS.js, loadCSS.js, and cookies.js by Filament Group ( https://github.com/filamentgroup )
- Git
    - Not so much a dependency as highly recomended

## Table of Contents ##
This index is for files and directories in the top level directory. Sub-directories have their own indexes where noted. Update this list and related lists throughout a project.

### Directories ###
1. CSS
    - Contains the CSS files, the SASS directory, the CRITICAL CSS directory, and the POLYFILL directory
    - TOC included
2. DOCS
    - Contains the Javascript documentation in YUI format.
    - View in browser for best experience
3. IMAGES
    - Contains the images for the project and two sub-directories for storing the raw image files prior to Optimization and/or Responsive Image creation
    - IMAGESRC : For images that need to be optimized
4. JS
    - Contains the project Javascript files. 
    - Seperated into Production and Development files.
    - TOC included
5. NODE_MODULES
    - Contains the Node Modules for Grunt and its plugins
6. PAGE_TEMPLATES
    - Contains custom Wordpress page templates
    - Each template has a description of its purpose

### Files ###
1. 404.php
2. archive.php
    - Standard archive template
3. author.php
    - Template for posts by author
4. category.php
    - Category taxonomy archive
5. comments.php
    - Template for comments section
6. config.rb 
    - The Compass configuration file.
    - Processed CSS is compressed by default but can be processed normally for debugging.
7. content-aside.php
    - Wordpress snippet for a single post marked as an "aside"
8. content-audio.php
    - Wordpress snippet for a single post marked as an "audio"
9. content-chat.php
    - Wordpress snippet for a single post marked as a "chat"
10. content-gallery.php
    - Wordpress snippet for a single post marked as a "gallery"
11. content-image.php
    - Wordpress snippet for a single post marked as an "image"
12. content-none.php
    - Wordpress snippet for when no posts are found
13. content-quote.php
    - Wordpress snippet for a single post marked as a "quote"
14. content-status.php
    - Wordpress snippet for a single post marked as a "status"
15. content-video.php
    - Wordpress snippet for a single post marked as a "video"
16. content.php
    - Wordpress snippet for a standard single post
17. favicon.ico
18. footer.php
19. functions.php
    - Extends the Wordpress core with costum functions
20. Gruntfile.js
    - The projects Gruntfile. By default the Gruntfile includes the plugins:
        - grunt-contrib-watch : For automating Grunt tasks during file changes.
        - grunt-contrib-uglify : For Uglifiing Javascript and concatenating files
        - grunt-contrib-compass : For running compass tasks and processing the SCSS
        - grunt-contrib-jshint : For checking for javascript errors
        - grunt-contrib-imagemin : For optimizing images
        - grunt-combine-mq : Used to combine like mediaqueries in the production style sheet.
        - grunt-contrib-cssmin : Used to minify the Critical CSS stylesheets
        - grunt-criticalcss : Determines the critical CSS for different templates and delivers style sheets with just the critical CSS to be inlined
        - grunt-contrib-yuidoc : For autogenerating Javascript documentation as formated in the comments
21. header.php
22. image.php
    - Template for displaying images individually
23. index.php
    - The main template for the Wordpress loop
    - If a template is missing Wordpress will turn here for displaying a loop (archive)
24. LICENSE.txt
    - An MIT License
25. package.json
    - The JSON file handling Node packages for Grunt
26. page.php
    - The default page template
27. README.md
    - The Readme file you are currently reading.
28. sreenshot.png
29. search.php
    - Search results template
30. searchform.php
    - Search form template
31. sidebar.php
32. single.php
    - Template for a single post
    - Calls on the content snippets
33. style.css
34. tag.php
    - Tag taxonomy archive
35. taxonomy-post_format.php
    - Template for a custom taxonomy archive
36. yuidoc.json
    - The JSON file configuring the YUI Javascript Documentation


## Headline Format ##
The required headline for the top of SCSS snippets and Markup sections

- Siren Framework v3.6
- File Name: {file name}
- File Purpose: {file purpose}
- File Notes: {notes for file}