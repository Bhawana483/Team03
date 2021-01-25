<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210122125136 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE log (id INT AUTO_INCREMENT NOT NULL, message LONGTEXT NOT NULL, level VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product CHANGE section section ENUM(\'male\', \'female\', \'kids\'), CHANGE size size ENUM(\'XL\', \'L\', \'M\', \'S\'), CHANGE quality quality ENUM(\'high \',\'average\'), CHANGE good_fit good_fit ENUM(\'slim fit\', \'loose fit\', \'normal\'), CHANGE attractiveness attractiveness ENUM(\'highly attractive\', \'fine\', \'normal\'), CHANGE pattern pattern ENUM(\'solid\', \'printed\', \'checks\',\'other\'), CHANGE length length ENUM(\'full length\',\'short length\', \'knee length\' ,\'normal\'), CHANGE neck neck ENUM(\'\',\'round neck\', \'v neck\', \'deep neck\'), CHANGE occasion occasion ENUM(\'traditional\', \'party wear\', \'casual wear\',\'formal wear\'), CHANGE sleeve sleeve ENUM(\'\',\'full sleeve\', \'mega sleeve\', \'lantern sleeve\'), CHANGE origin origin ENUM(\'made in india\', \'made in zimbawe\', \'made in britain\',\'others\'), CHANGE ease_of_care ease_of_care ENUM(\'dryclean\', \'washable\'), CHANGE status status ENUM(\'new\', \'review\', \'published\'), CHANGE cloth_type cloth_type ENUM(\'cotton\', \'nylon\', \'silk\',\'other\')');
        $this->addSql('ALTER TABLE user CHANGE gender gender ENUM(\'male\', \'female\' , \'other\')');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE log');
        $this->addSql('ALTER TABLE product CHANGE cloth_type cloth_type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE section section VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE size size VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE quality quality VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE good_fit good_fit VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE attractiveness attractiveness VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE pattern pattern VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE length length VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE neck neck VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE occasion occasion VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sleeve sleeve VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE origin origin VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ease_of_care ease_of_care VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE status status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `user` CHANGE gender gender VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
