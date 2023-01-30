<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230129184205 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE EMP DROP FOREIGN KEY EMP_ibfk_1');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE DETALLE DROP FOREIGN KEY DETALLE_ibfk_2');
        $this->addSql('ALTER TABLE DETALLE DROP FOREIGN KEY DETALLE_ibfk_1');
        $this->addSql('ALTER TABLE PEDIDO DROP FOREIGN KEY PEDIDO_ibfk_1');
        $this->addSql('DROP TABLE DETALLE');
        $this->addSql('DROP TABLE PRODUCTO');
        $this->addSql('DROP TABLE DEPT');
        $this->addSql('DROP TABLE PEDIDO');
        $this->addSql('DROP INDEX CLIENTE_NOMBRE ON CLIENTE');
        $this->addSql('DROP INDEX CLIENTE_REPR_CLI ON CLIENTE');
        $this->addSql('ALTER TABLE CLIENTE DROP FOREIGN KEY CLIENTE_ibfk_1');
        $this->addSql('ALTER TABLE CLIENTE CHANGE CLIENTE_COD CLIENTE_COD INT NOT NULL, CHANGE REPR_COD REPR_COD SMALLINT DEFAULT NULL, CHANGE LIMITE_CREDITO LIMITE_CREDITO NUMERIC(9, 2) DEFAULT NULL, CHANGE OBSERVACIONES OBSERVACIONES LONGTEXT DEFAULT NULL');
        $this->addSql('DROP INDEX idx_cliente_repr_cod ON CLIENTE');
        $this->addSql('CREATE INDEX IDX_CB59653FCDAD1F7E ON CLIENTE (REPR_COD)');
        $this->addSql('ALTER TABLE CLIENTE ADD CONSTRAINT CLIENTE_ibfk_1 FOREIGN KEY (REPR_COD) REFERENCES EMP (EMP_NO)');
        $this->addSql('ALTER TABLE EMP DROP FOREIGN KEY EMP_ibfk_2');
        $this->addSql('DROP INDEX EMP_APELLIDOS ON EMP');
        $this->addSql('DROP INDEX EMP_DEPT_NO_EMP ON EMP');
        $this->addSql('DROP INDEX IDX_EMP_JEFE ON EMP');
        $this->addSql('DROP INDEX IDX_EMP_DEPT_NO ON EMP');
        $this->addSql('ALTER TABLE EMP CHANGE EMP_NO EMP_NO SMALLINT NOT NULL, CHANGE JEFE JEFE SMALLINT DEFAULT NULL, CHANGE SALARIO SALARIO INT DEFAULT NULL, CHANGE COMISION COMISION INT DEFAULT NULL, CHANGE DEPT_NO DEPT_NO INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE DETALLE (PEDIDO_NUM SMALLINT UNSIGNED NOT NULL, DETALLE_NUM SMALLINT UNSIGNED NOT NULL, PROD_NUM INT UNSIGNED NOT NULL, PRECIO_VENTA NUMERIC(8, 2) UNSIGNED DEFAULT NULL, CANTIDAD INT DEFAULT NULL, IMPORTE NUMERIC(8, 2) DEFAULT NULL, INDEX IDX_PROD_NUM (PROD_NUM), INDEX DETALLE_PROD_COM_DET (PROD_NUM, PEDIDO_NUM, DETALLE_NUM), INDEX IDX_DETAL_PEDIDO_NUM (PEDIDO_NUM), PRIMARY KEY(PEDIDO_NUM, DETALLE_NUM)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE PRODUCTO (PROD_NUM INT UNSIGNED NOT NULL, DESCRIPCION VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, UNIQUE INDEX DESCRIPCION (DESCRIPCION), PRIMARY KEY(PROD_NUM)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE DEPT (DEPT_NO TINYINT(1) NOT NULL, DNOMBRE VARCHAR(14) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, LOC VARCHAR(14) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, color VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, UNIQUE INDEX DNOMBRE (DNOMBRE), PRIMARY KEY(DEPT_NO)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE PEDIDO (PEDIDO_NUM SMALLINT UNSIGNED NOT NULL, PEDIDO_FECHA DATE DEFAULT NULL, PEDIDO_TIPO CHAR(1) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, CLIENTE_COD INT UNSIGNED NOT NULL, FECHA_ENVIO DATE DEFAULT NULL, TOTAL NUMERIC(8, 2) UNSIGNED DEFAULT NULL, INDEX PEDIDO_ENVIO_NUM (FECHA_ENVIO, PEDIDO_NUM), INDEX IDX_PEDIDO_CLIENTE_COD (CLIENTE_COD), INDEX PEDIDO_FECHA_NUM (PEDIDO_FECHA, PEDIDO_NUM), PRIMARY KEY(PEDIDO_NUM)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE DETALLE ADD CONSTRAINT DETALLE_ibfk_2 FOREIGN KEY (PROD_NUM) REFERENCES PRODUCTO (PROD_NUM)');
        $this->addSql('ALTER TABLE DETALLE ADD CONSTRAINT DETALLE_ibfk_1 FOREIGN KEY (PEDIDO_NUM) REFERENCES PEDIDO (PEDIDO_NUM)');
        $this->addSql('ALTER TABLE PEDIDO ADD CONSTRAINT PEDIDO_ibfk_1 FOREIGN KEY (CLIENTE_COD) REFERENCES CLIENTE (CLIENTE_COD)');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE CLIENTE DROP FOREIGN KEY FK_CB59653FCDAD1F7E');
        $this->addSql('ALTER TABLE CLIENTE CHANGE CLIENTE_COD CLIENTE_COD INT UNSIGNED NOT NULL, CHANGE LIMITE_CREDITO LIMITE_CREDITO NUMERIC(9, 2) UNSIGNED DEFAULT NULL, CHANGE OBSERVACIONES OBSERVACIONES TEXT DEFAULT NULL, CHANGE REPR_COD REPR_COD SMALLINT UNSIGNED DEFAULT NULL');
        $this->addSql('CREATE INDEX CLIENTE_NOMBRE ON CLIENTE (NOMBRE)');
        $this->addSql('CREATE INDEX CLIENTE_REPR_CLI ON CLIENTE (REPR_COD, CLIENTE_COD)');
        $this->addSql('DROP INDEX idx_cb59653fcdad1f7e ON CLIENTE');
        $this->addSql('CREATE INDEX IDX_CLIENTE_REPR_COD ON CLIENTE (REPR_COD)');
        $this->addSql('ALTER TABLE CLIENTE ADD CONSTRAINT FK_CB59653FCDAD1F7E FOREIGN KEY (REPR_COD) REFERENCES EMP (EMP_NO)');
        $this->addSql('ALTER TABLE EMP CHANGE EMP_NO EMP_NO SMALLINT UNSIGNED NOT NULL, CHANGE JEFE JEFE SMALLINT UNSIGNED DEFAULT NULL, CHANGE SALARIO SALARIO INT UNSIGNED DEFAULT NULL, CHANGE COMISION COMISION INT UNSIGNED DEFAULT NULL, CHANGE DEPT_NO DEPT_NO TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE EMP ADD CONSTRAINT EMP_ibfk_2 FOREIGN KEY (JEFE) REFERENCES EMP (EMP_NO)');
        $this->addSql('ALTER TABLE EMP ADD CONSTRAINT EMP_ibfk_1 FOREIGN KEY (DEPT_NO) REFERENCES DEPT (DEPT_NO)');
        $this->addSql('CREATE INDEX EMP_APELLIDOS ON EMP (APELLIDOS)');
        $this->addSql('CREATE INDEX EMP_DEPT_NO_EMP ON EMP (DEPT_NO, EMP_NO)');
        $this->addSql('CREATE INDEX IDX_EMP_JEFE ON EMP (JEFE)');
        $this->addSql('CREATE INDEX IDX_EMP_DEPT_NO ON EMP (DEPT_NO)');
    }
}
