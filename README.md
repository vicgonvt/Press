# Press
An elegant markdown-powered blog for the Laravel framework.

# Install

Add these lines to your `composer.json` file

```json
{
    "require": {
        "vicgonvt/press": "dev-master"
    },
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/vicgonvt/press.git"
        }
    ]
}
```

And then in the terminal, run the following command.

`composer update`

### Migrate Database

Now that we have our package installed, we need to migrate the database to add the necessary tables for Press. In the command line, run the following command.

`php artisan migrate`

### Publish the package config

Up next, you need to publish the package's config file that includes some defaults for us. To publish that, run the following command.

`php artisan vendor:publish --tag=press-config`

You will now find the config file located in `/config/press.php`

### Create directory to hold posts

The last step in the installation, is to create a directory for your markdown files that Press will use to turn into your blog posts. By default, it is just a directory in the root directory of your project called `blogs`. You may change that in the config file we published in the previous step.

`mkdir blogs`

### Sample Post

To create your first post, here's a sample markdown file to get you started. Copy and paste it into a `.md` file in your blogs diretory.

```
---
title: My First Blog Post
description: This is my very first blog post with Press
---

# Extra Extra Extra!

You are now a blogger!
```

# Course
This repo holds is the source code for the Laravel Package Development course found here - https://coderstape.com/series/1-laravel-package-development

# In Progress

Be warned, this source code and course is for educational purposes only and may not be production ready. Use at your own risk.
