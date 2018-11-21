Advanced Solr - Build Data Driven Features
==========================================

Prepare Solr
------------

1. Create a new collection called `umami` on your Solr Cloud.

2. Deploy the configuration located in the `solr_7.x_config` to this collection. 


Install the Drupal / Umami / Solr Example
-----------------------------------------

1. Run `composer install` to download all components.

2. Run `drush site:install demo_umami --account-pass=test` to install the site.

3. Run `drush drush search-api:index` to index the recipes.

We assume that you know how to configure your webserver ;-)


Using LTR
---------

1. start Solr with `-Dsolr.ltr.enabled=true`

2. upload the features
`curl -XPUT 'http://localhost:8983/solr/umami/schema/feature-store' --data-binary '@./ltr/umamiFeatures.json' -H 'Content-type:application/json'`

3. upload the model
`curl -XPUT 'http://localhost:8983/solr/umami/schema/model-store' --data-binary '@./ltr/umamiModel.json' -H 'Content-type:application/json'`

