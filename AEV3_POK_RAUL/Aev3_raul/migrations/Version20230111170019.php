<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230111170019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE CLIENTE (CLIENTE_COD INT NOT NULL, NOMBRE VARCHAR(45) NOT NULL, DIREC VARCHAR(40) NOT NULL, CIUDAD VARCHAR(30) NOT NULL, ESTADO VARCHAR(2) DEFAULT NULL, COD_POSTAL VARCHAR(9) NOT NULL, AREA SMALLINT DEFAULT NULL, TELEFONO VARCHAR(9) DEFAULT NULL, LIMITE_CREDITO NUMERIC(9, 2) DEFAULT NULL, OBSERVACIONES LONGTEXT DEFAULT NULL, REPR_COD SMALLINT DEFAULT NULL, INDEX IDX_CB59653FCDAD1F7E (REPR_COD), PRIMARY KEY(CLIENTE_COD)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE EMP (EMP_NO SMALLINT NOT NULL, APELLIDOS VARCHAR(10) NOT NULL, OFICIO VARCHAR(10) DEFAULT NULL, JEFE SMALLINT DEFAULT NULL, FECHA_ALTA DATE DEFAULT NULL, SALARIO INT DEFAULT NULL, COMISION INT DEFAULT NULL, DEPT_NO INT NOT NULL, PRIMARY KEY(EMP_NO)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE CLIENTE ADD CONSTRAINT FK_CB59653FCDAD1F7E FOREIGN KEY (REPR_COD) REFERENCES EMP (EMP_NO)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE CLIENTE DROP FOREIGN KEY FK_CB59653FCDAD1F7E');
        $this->addSql('DROP TABLE CLIENTE');
        $this->addSql('DROP TABLE EMP');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
