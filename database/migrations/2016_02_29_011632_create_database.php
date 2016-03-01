<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabase extends Migration
{
    /**
     * This migration builds our donors, charities, and donations tables from raw sql
     *
     * @return void
     */
    public function up()
    {

        DB::statement('
            CREATE TABLE donors(
                id INT NOT NULL AUTO_INCREMENT,
                name varchar(255) NOT NULL,
                email varchar(255) NOT NULL,
                UNIQUE (email),
                PRIMARY KEY (id)
            ) ENGINE=INNODB;
        ');

        DB::statement('
            CREATE TABLE charities(
                id INT NOT NULL AUTO_INCREMENT,
                name varchar(255) NOT NULL,
                ein varchar(9) NOT NULL,
                UNIQUE (ein),
                PRIMARY KEY (id)
            ) ENGINE=INNODB;
        ');

        DB::statement('
            CREATE TABLE donations(
                id INT NOT NULL AUTO_INCREMENT,
                donor INT NULL,
                charity INT NULL,
                amount DECIMAL(10,2) NOT NULL,
                created_at DATE NOT NULL,
                PRIMARY KEY (id),
                FOREIGN KEY (donor) REFERENCES donors(id),
                FOREIGN KEY (charity) REFERENCES charities(id)
            ) ENGINE=INNODB;
        ');

    }

    /**
     * Drops our donors, charities, and donations tables
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('donors');
        Schema::drop('charities');
        Schema::drop('donations');
    }
}
