<?php

/**
* @copyright Copyright &copy; Gogodigital Srls
* @company Gogodigital Srls - Wide ICT Solutions 
* @website http://www.gogodigital.it
* @github https://github.com/cinghie/yii2-articles
* @license GNU GENERAL PUBLIC LICENSE VERSION 3
* @package yii2-articles
* @version 1.0
*/
/*
CREATE TABLE IF NOT EXISTS `article_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` text,
  `parentid` int(11) DEFAULT '0',
  `published` smallint(6) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `image` text,
  `image_caption` varchar(255) DEFAULT NULL,
  `image_credits` varchar(255) DEFAULT NULL,
  `params` text,
  `metadesc` text,
  `metakey` text,
  `robots` varchar(20) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `copyright` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`,`parentid`), 
  KEY `category` (`published`,`access`), 
  KEY `parentid` (`parentid`), 
  KEY `ordering` (`ordering`), 
  KEY `published` (`published`), 
  KEY `access` (`access`), 
  KEY `language` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- TABLE `article_items`
--

CREATE TABLE IF NOT EXISTS `article_items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `catid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `introtext` text,
  `fulltext` text,
  `published` smallint(6) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `image` text,
  `image_caption` varchar(255) DEFAULT NULL,
  `image_credits` varchar(255) DEFAULT NULL,
  `video` text,
  `video_type` varchar(20) DEFAULT NULL,
  `video_caption` varchar(255) DEFAULT NULL,
  `video_credits` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `params` text,
  `metadesc` text,
  `metakey` text,
  `robots` varchar(20) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `copyright` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`), 
  FOREIGN KEY (`catid`) REFERENCES `article_categories`(`id`),
  FOREIGN KEY (`userid`) REFERENCES `user`(`id`),
  KEY `item` (`published`,`access`), 
  KEY `catid` (`catid`), 
  KEY `created_by` (`created_by`), 
  KEY `ordering` (`ordering`), 
  KEY `hits` (`hits`), 
  KEY `created` (`created`), 
  KEY `language` (`language`), 
  KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- TABLE `article_attachments``
--

CREATE TABLE IF NOT EXISTS `article_attachments` (
  `id` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `titleAttribute` text NOT NULL,
  `hits` int(11) NOT NULL,
  PRIMARY KEY (`id`), 
  FOREIGN KEY (`itemid`) REFERENCES `article_items`(`id`),
  KEY `itemid` (`itemid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `article_categories`
--
ALTER TABLE `article_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_items`
--
ALTER TABLE `article_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_attachments`
--
ALTER TABLE `article_attachments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
*/
use yii\db\Schema;
use yii\db\Migration;

class m150518_213817_articles_table extends Migration
{
    public function safeUp()
    {
        /*
        `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` text,
  `parentid` int(11) DEFAULT '0',
  `published` smallint(6) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `image` text,
  `image_caption` varchar(255) DEFAULT NULL,
  `image_credits` varchar(255) DEFAULT NULL,
  `params` text,
  `metadesc` text,
  `metakey` text,
  `robots` varchar(20) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `copyright` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`,`parentid`), 
  KEY `category` (`published`,`access`), 
  KEY `parentid` (`parentid`), 
  KEY `ordering` (`ordering`), 
  KEY `published` (`published`), 
  KEY `access` (`access`), 
  KEY `language` (`language`)
        */
       $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
         $this->createTable('{{%article_categories}}', [
            'id' => Schema::TYPE_PK,
            'alias' => Schema::TYPE_STRING.' NOT NULL',
            'name'=>Schema::TYPE_STRING.' NOT NULL',
            'name_hi'=>Schema::TYPE_STRING.' NOT NULL',
            'description'=>Schema::TYPE_TEXT,
            'parentid'=>Schema::TYPE_INTEGER.' default 0',
            'published'=>Schema::TYPE_INTEGER.' default 0',
            'access'=>Schema::TYPE_INTEGER,
            'language'=>Schema::TYPE_STRING.'(7) NOT NULL',
            'ordering'=>Schema::TYPE_INTEGER.'(11) NOT NULL DEFAULT 0',
            'image'=>Schema::TYPE_TEXT,
            'image_caption'=>Schema::STRING.'(255) DEFAULT NULL',
            'image_credits'=>Schema::STRING.'(255) DEFAULT NULL',
             'params'=> Schema::TYPE_TEXT,
            'metadesc'=>Schema::TYPE_TEXT,
            'metakey'=>Schema::TYPE_TEXT,
            'robots'=>Schema::TYPE_STRING.'(20) DEFAULT NULL',
            'author'=>Schema::TYPE_STRING.'(50) DEFAULT NULL',
            'copyright'=>Schema::TYPE_STRING.'(50) DEFAULT NULL',
            
                    ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%articles_categories}}');

        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
