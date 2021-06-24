Elastic Seatch Installation

/***** Elastic Seatch Installation *****/

Step 1:
In this step, we are going to Install Elasticsearch. In order to install it, we will use our local machine. We can easily install it into our system by using the following link:


1) Step 1 — Installing Java :

-Before installing OpenJDK with APT, update the list of available packages for installation on your Ubuntu Droplet by running the command:
$ sudo apt-get update

-After that, you can install OpenJDK with the command:
$ sudo apt-get install openjdk-7-jre

-To verify your JRE is installed and can be used, run the command:
java -version


2) Step 2 — Downloading and Installing Elasticsearch :

$ wget https://download.elastic.co/elasticsearch/elasticsearch/elasticsearch-1.7.2.deb

-Then install it in the usual Ubuntu way with the dpkg command like this:
$ sudo dpkg -i elasticsearch-1.7.2.deb

-To make sure Elasticsearch starts and stops automatically with the Droplet, add its init script to the default runlevels with the command:
$ sudo update-rc.d elasticsearch defaults


3) Step 3 — Configuring Elastic :

-To start editing the main elasticsearch.yml configuration file:
$ sudo nano /etc/elasticsearch/elasticsearch.yml

1 . Remove the # character at the beginning of the lines for node.name and cluster.name to uncomment them, and then change their values.
2 . node.name: "My First Node"
3 . cluster.name: mycluster1
4 . Once you make all the changes, please save and exit the file. Now you can start Elasticsearch for the first time with the command:
$ sudo service elasticsearch start


Step 4 — Securing Elastic :

-Elasticsearch has no built-in security and can be controlled by anyone who can access the HTTP API. So, the first security tweak is to prevent public access. To remove public access edit the file elasticsearch.yml:
$ sudo nano /etc/elasticsearch/elasticsearch.yml
-Find the line that contains network.bind_host, uncomment it by removing the # character at the beginning of the line, and change the value to localhost so it looks like this:
network.bind_host: localhost


Step 5 — Testing :

$ curl -X GET 'http://localhost:9200' or run http://localhost:9200 in any browser.
You should see the response like following:
{
“status”:200,

“name”:”Harry Leland”,

“cluster_name”:”elasticsearch”,

"version" : {

“number”:”1.7.2”,

“build_hash”:”e43676b1385b8125d647f593f7202acbd816e8ec”,

"build_timestamp" : "2015-09-14T09:49:53Z",

"build_snapshot" : false,

"lucene_version" : "4.10.4"

},

"tagline" : "You Know, for Search"

}


/***** End Elastic Seatch Installation *****/

Elasticquent Installation

/***** Elasticquent Installation *****/



->How Elasticquent Works
When using a database, Eloquent models are populated from data read from a database table. With Elasticquent, models are populated by data indexed in Elasticsearch. The whole idea behind using Elasticsearch for search is that its fast and light, so you model functionality will be dictated by what data has been indexed for your document.

->Before you start using Elasticquent, make sure you've installed Elasticsearch.

->To get started, add Elasticquent to you composer.json file:
"elasticquent/elasticquent": "dev-master"

->Once you've run a composer update, you need to register Laravel service provider, in your config/app.php:
'providers' => [
...
Elasticquent\ElasticquentServiceProvider::class,
],

->We also provide a facade for elasticsearch-php client (which has connected using our settings), add following to your config/app.php if you need so.
'aliases' => [
...
'Es' => Elasticquent\ElasticquentElasticsearchFacade::class,
],

->Then add the Elasticquent trait to any Eloquent model that you want to be able to index in Elasticsearch:
use Elasticquent\ElasticquentTrait;

class Book extends Eloquent
{
    use ElasticquentTrait;
}

->Now your Eloquent model has some extra methods that make it easier to index your model's data using Elasticsearch.

/***** End Elasticquent Installation *****/


Elasticquent Configuration

/***** Elasticquent Configuration *****/

->By default, Elasticquent will connect to localhost:9200 and use default as index name, you can change this and the other settings in the configuration file. You can add the elasticquent.php config file at /app/config/elasticquent.php for Laravel 4, or use the following Artisan command to publish the configuration file into your config directory:
$ php artisan vendor:publish --provider="Elasticquent\ElasticquentServiceProvider"

<?php
return array(
    /*
    |--------------------------------------------------------------------------
    | Custom Elasticsearch Client Configuration
    |--------------------------------------------------------------------------
    |
    | This array will be passed to the Elasticsearch client.
    | See configuration options here:
    |
    | http://www.elasticsearch.org/guide/en/elasticsearch/client/php-api/current/_configuration.html
    */

    'config' => [
        'hosts'     => ['localhost:9200'],
        'retries'   => 1,
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Index Name
    |--------------------------------------------------------------------------
    |
    | This is the index name that Elastiquent will use for all
    | Elastiquent models.
    */

    'default_index' => 'my_custom_index_name',
);

/***** End Elasticquent Configuration *****/

/**** Indexing ****/

1 . For add single instance in index - 

addToIndex()

2 . For add all instance in index - 

addAllToIndex()

3 . For reindex - 

reindex()

4 . For remove index - 

removeFromIndex()

/**** End Indexing ****/


/**** Searching ****/

1 . Simple term search - 

search()

2 . Query Based Search - 

searchByQuery()

3 . Raw queries - 

complexSearch()

/**** End Searching ****/