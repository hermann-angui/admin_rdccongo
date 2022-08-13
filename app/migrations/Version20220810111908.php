<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220810111908 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE application (id INT NOT NULL, applicant_id INT NOT NULL, parent_id INT DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, middle_name VARCHAR(255) DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, marital_status VARCHAR(255) DEFAULT NULL, country_of_residence VARCHAR(255) DEFAULT NULL, place_of_birth VARCHAR(255) DEFAULT NULL, date_of_birth TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, country_of_birth VARCHAR(255) DEFAULT NULL, current_nationality VARCHAR(255) DEFAULT NULL, current_nationality_acquired_by VARCHAR(255) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, passport_scan VARCHAR(255) DEFAULT NULL, invitation_letter_scan VARCHAR(255) DEFAULT NULL, hotel_reservation_scan VARCHAR(255) DEFAULT NULL, flight_ticket_scan VARCHAR(255) DEFAULT NULL, passport_number VARCHAR(255) DEFAULT NULL, father_date_of_birth TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, mother_date_of_birth TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, spouse_firstname VARCHAR(255) DEFAULT NULL, spouse_lastname VARCHAR(255) DEFAULT NULL, spouse_date_of_birth TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, application_number VARCHAR(255) DEFAULT NULL, transit_depart_from TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, transit_depart_to TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, transit_return_from TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, transit_return_to TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, visa_type VARCHAR(255) DEFAULT NULL, first_entry_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, first_entry_place TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, first_returning_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, first_returning_place VARCHAR(255) DEFAULT NULL, last_entry_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, last_entry_place TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, last_returning_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, last_returning_place VARCHAR(255) DEFAULT NULL, sponsorship_fullname VARCHAR(255) DEFAULT NULL, sponsorship_address VARCHAR(255) DEFAULT NULL, sponsorship_phonenumber VARCHAR(255) DEFAULT NULL, sponsorship_garantee VARCHAR(255) DEFAULT NULL, profession VARCHAR(255) DEFAULT NULL, father_firstname VARCHAR(255) DEFAULT NULL, father_lastname VARCHAR(255) DEFAULT NULL, father_nationality VARCHAR(255) DEFAULT NULL, mother_firstname VARCHAR(255) DEFAULT NULL, mother_lastname VARCHAR(255) DEFAULT NULL, mother_nationality VARCHAR(255) DEFAULT NULL, passport_type VARCHAR(255) DEFAULT NULL, passport_issuedate TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, passport_expirydate TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, passport_issueby VARCHAR(255) DEFAULT NULL, residency_cardnumber VARCHAR(255) DEFAULT NULL, residency_expirationdate TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, purpose_of_travel VARCHAR(255) DEFAULT NULL, spouse_name VARCHAR(255) DEFAULT NULL, spouse_nationality VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, application_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, date_created TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A45BDDC197139001 ON application (applicant_id)');
        $this->addSql('CREATE INDEX IDX_A45BDDC1727ACA70 ON application (parent_id)');
        $this->addSql('CREATE TABLE visa (id INT NOT NULL, application_id INT NOT NULL, number VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_16B1AB083E030ACD ON visa (application_id)');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC197139001 FOREIGN KEY (applicant_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC1727ACA70 FOREIGN KEY (parent_id) REFERENCES application (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE visa ADD CONSTRAINT FK_16B1AB083E030ACD FOREIGN KEY (application_id) REFERENCES application (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE application DROP CONSTRAINT FK_A45BDDC1727ACA70');
        $this->addSql('ALTER TABLE visa DROP CONSTRAINT FK_16B1AB083E030ACD');
        $this->addSql('DROP TABLE application');
        $this->addSql('DROP TABLE visa');
    }
}
