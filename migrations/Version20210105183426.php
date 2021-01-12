<?php
declare(strict_types=1);
/**
 *
 */

namespace DoctrineMigrations;

use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210105183426 extends AbstractMigration
{

    /**
     * @param Schema $schema
     *
     * @throws Exception
     */
    public function up(Schema $schema): void
    {
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() !== 'postgresql',
            'Migration can only be executed safely on \'postgresql\'.'
        );
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE eav_row_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql(
            'CREATE TABLE eav_attribute (id SERIAL NOT NULL, entity_id INT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, is_unique BOOLEAN NOT NULL, constraints TEXT NOT NULL, PRIMARY KEY(id))'
        );
        $this->addSql('CREATE INDEX IDX_EDA4B18881257D5D ON eav_attribute (entity_id)');
        $this->addSql('CREATE UNIQUE INDEX pk_eav_attribute ON eav_attribute (name, entity_id)');
        $this->addSql('COMMENT ON COLUMN eav_attribute.constraints IS \'(DC2Type:array)\'');
        $this->addSql(
            'CREATE TABLE eav_entity (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(512) NOT NULL, composite_unique_keys TEXT NOT NULL, fields_count INT NOT NULL, PRIMARY KEY(id))'
        );
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9F14D6275E237E06 ON eav_entity (name)');
        $this->addSql('COMMENT ON COLUMN eav_entity.composite_unique_keys IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE eav_row (id INT NOT NULL, entity_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_19C7459181257D5D ON eav_row (entity_id)');
        $this->addSql(
            'CREATE TABLE eav_mapping (eav_row_id INT NOT NULL, eav_mapped_row_id INT NOT NULL, PRIMARY KEY(eav_row_id, eav_mapped_row_id))'
        );
        $this->addSql('CREATE INDEX IDX_AF144C19129EFBBD ON eav_mapping (eav_row_id)');
        $this->addSql('CREATE INDEX IDX_AF144C19DB5F5195 ON eav_mapping (eav_mapped_row_id)');
        $this->addSql(
            'CREATE TABLE eav_value (id SERIAL NOT NULL, attribute_id INT NOT NULL, row_id INT NOT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id))'
        );
        $this->addSql('CREATE INDEX IDX_4589807AB6E62EFA ON eav_value (attribute_id)');
        $this->addSql('CREATE INDEX IDX_4589807A83A269F2 ON eav_value (row_id)');
        $this->addSql(
            'ALTER TABLE eav_attribute ADD CONSTRAINT FK_EDA4B18881257D5D FOREIGN KEY (entity_id) REFERENCES eav_entity (id) NOT DEFERRABLE INITIALLY IMMEDIATE'
        );
        $this->addSql(
            'ALTER TABLE eav_row ADD CONSTRAINT FK_19C7459181257D5D FOREIGN KEY (entity_id) REFERENCES eav_entity (id) NOT DEFERRABLE INITIALLY IMMEDIATE'
        );
        $this->addSql(
            'ALTER TABLE eav_mapping ADD CONSTRAINT FK_AF144C19129EFBBD FOREIGN KEY (eav_row_id) REFERENCES eav_row (id) NOT DEFERRABLE INITIALLY IMMEDIATE'
        );
        $this->addSql(
            'ALTER TABLE eav_mapping ADD CONSTRAINT FK_AF144C19DB5F5195 FOREIGN KEY (eav_mapped_row_id) REFERENCES eav_row (id) NOT DEFERRABLE INITIALLY IMMEDIATE'
        );
        $this->addSql(
            'ALTER TABLE eav_value ADD CONSTRAINT FK_4589807AB6E62EFA FOREIGN KEY (attribute_id) REFERENCES eav_attribute (id) NOT DEFERRABLE INITIALLY IMMEDIATE'
        );
        $this->addSql(
            'ALTER TABLE eav_value ADD CONSTRAINT FK_4589807A83A269F2 FOREIGN KEY (row_id) REFERENCES eav_row (id) NOT DEFERRABLE INITIALLY IMMEDIATE'
        );
    }

    /**
     * @param Schema $schema
     *
     * @throws Exception
     */
    public function down(Schema $schema): void
    {
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() !== 'postgresql',
            'Migration can only be executed safely on \'postgresql\'.'
        );
        $this->addSql('ALTER TABLE eav_value DROP CONSTRAINT FK_4589807AB6E62EFA');
        $this->addSql('ALTER TABLE eav_attribute DROP CONSTRAINT FK_EDA4B18881257D5D');
        $this->addSql('ALTER TABLE eav_row DROP CONSTRAINT FK_19C7459181257D5D');
        $this->addSql('ALTER TABLE eav_mapping DROP CONSTRAINT FK_AF144C19129EFBBD');
        $this->addSql('ALTER TABLE eav_mapping DROP CONSTRAINT FK_AF144C19DB5F5195');
        $this->addSql('ALTER TABLE eav_value DROP CONSTRAINT FK_4589807A83A269F2');
        $this->addSql('DROP SEQUENCE eav_row_id_seq CASCADE');
        $this->addSql('DROP TABLE eav_attribute');
        $this->addSql('DROP TABLE eav_entity');
        $this->addSql('DROP TABLE eav_row');
        $this->addSql('DROP TABLE eav_mapping');
        $this->addSql('DROP TABLE eav_value');
    }
}
