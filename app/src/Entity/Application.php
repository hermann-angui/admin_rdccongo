<?php

namespace App\Entity;

use App\Repository\ApplicationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ApplicationRepository::class)]
class Application
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['application'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $first_name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $last_name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $middle_name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $gender;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $marital_status;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $country_of_residence;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $place_of_birth;

    #[ORM\Column(type: 'datetime', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $date_of_birth;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $country_of_birth;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $current_nationality;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $current_nationality_acquired_by;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $photo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $passport_scan;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $invitation_letter_scan;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $hotel_reservation_scan;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $flight_ticket_scan;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $passport_number;

    #[ORM\Column(type: 'datetime', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $father_date_of_birth;

    #[ORM\Column(type: 'datetime', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $mother_date_of_birth;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $spouse_firstname;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $spouse_lastname;

    #[ORM\Column(type: 'datetime', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $spouse_date_of_birth;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    #[ORM\GeneratedValue]
    private $application_number;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['application'])]
    private $transit_depart_from;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['application'])]
    private $transit_depart_to;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['application'])]
    private $transit_return_from;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['application'])]
    private $transit_return_to;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $visa_type;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['application'])]
    private $first_entry_date;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['application'])]
    private $first_entry_place;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['application'])]
    private $first_returning_date;

    #[ORM\Column(type: 'string', nullable: true)]
    #[Groups(['application'])]
    private $first_returning_place;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['application'])]
    private $last_entry_date;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['application'])]
    private $last_entry_place;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['application'])]
    private $last_returning_date;

    #[ORM\Column(type: 'string', nullable: true)]
    #[Groups(['application'])]
    private $last_returning_place;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $sponsorship_fullname;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $sponsorship_address;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $sponsorship_phonenumber;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $sponsorship_garantee;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $profession;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $father_firstname;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $father_lastname;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $father_nationality;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $mother_firstname;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $mother_lastname;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $mother_nationality;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $passport_type;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['application'])]
    private $passport_issuedate;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['application'])]
    private $passport_expirydate;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $passport_issueby;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $residency_cardnumber;

    #[ORM\Column(type: 'datetime', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $residency_expirationdate;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $purpose_of_travel;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $spouse_name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $spouse_nationality;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $phone_number;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $address;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['application'])]
    private $status;

    #[ORM\ManyToOne(inversedBy: 'applications')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $applicant = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['application'])]
    private $application_date = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['application'])]
    private $date_created = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'parent_application')]
    private ?self $parent = null;

    public function __construct()
    {
        $this->date_created = new \DateTime();
        $this->application_date = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     * @return Application
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     * @return Application
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMiddleName()
    {
        return $this->middle_name;
    }

    /**
     * @param mixed $middle_name
     * @return Application
     */
    public function setMiddleName($middle_name)
    {
        $this->middle_name = $middle_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     * @return Application
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaritalStatus()
    {
        return $this->marital_status;
    }

    /**
     * @param mixed $marital_status
     * @return Application
     */
    public function setMaritalStatus($marital_status)
    {
        $this->marital_status = $marital_status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountryOfResidence()
    {
        return $this->country_of_residence;
    }

    /**
     * @param mixed $country_of_residence
     * @return Application
     */
    public function setCountryOfResidence($country_of_residence)
    {
        $this->country_of_residence = $country_of_residence;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlaceOfBirth()
    {
        return $this->place_of_birth;
    }

    /**
     * @param mixed $place_of_birth
     * @return Application
     */
    public function setPlaceOfBirth($place_of_birth)
    {
        $this->place_of_birth = $place_of_birth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    /**
     * @param mixed $date_of_birth
     * @return Application
     */
    public function setDateOfBirth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountryOfBirth()
    {
        return $this->country_of_birth;
    }

    /**
     * @param mixed $country_of_birth
     * @return Application
     */
    public function setCountryOfBirth($country_of_birth)
    {
        $this->country_of_birth = $country_of_birth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrentNationality()
    {
        return $this->current_nationality;
    }

    /**
     * @param mixed $current_nationality
     * @return Application
     */
    public function setCurrentNationality($current_nationality)
    {
        $this->current_nationality = $current_nationality;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrentNationalityAcquiredBy()
    {
        return $this->current_nationality_acquired_by;
    }

    /**
     * @param mixed $current_nationality_acquired_by
     * @return Application
     */
    public function setCurrentNationalityAcquiredBy($current_nationality_acquired_by)
    {
        $this->current_nationality_acquired_by = $current_nationality_acquired_by;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     * @return Application
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassportScan()
    {
        return $this->passport_scan;
    }

    /**
     * @param mixed $passport_scan
     * @return Application
     */
    public function setPassportScan($passport_scan)
    {
        $this->passport_scan = $passport_scan;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getInvitationLetterScan()
    {
        return $this->invitation_letter_scan;
    }

    /**
     * @param mixed $invitation_letter_scan
     * @return Application
     */
    public function setInvitationLetterScan($invitation_letter_scan)
    {
        $this->invitation_letter_scan = $invitation_letter_scan;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getHotelReservationScan()
    {
        return $this->hotel_reservation_scan;
    }

    /**
     * @param mixed $hotel_reservation_scan
     * @return Application
     */
    public function setHotelReservationScan($hotel_reservation_scan)
    {
        $this->hotel_reservation_scan = $hotel_reservation_scan;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFlightTicketScan()
    {
        return $this->flight_ticket_scan;
    }

    /**
     * @param mixed $flight_ticket_scan
     * @return Application
     */
    public function setFlightTicketScan($flight_ticket_scan)
    {
        $this->flight_ticket_scan = $flight_ticket_scan;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassportNumber()
    {
        return $this->passport_number;
    }

    /**
     * @param mixed $passport_number
     * @return Application
     */
    public function setPassportNumber($passport_number)
    {
        $this->passport_number = $passport_number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFatherDateOfBirth()
    {
        return $this->father_date_of_birth;
    }

    /**
     * @param mixed $father_date_of_birth
     * @return Application
     */
    public function setFatherDateOfBirth($father_date_of_birth)
    {
        $this->father_date_of_birth = $father_date_of_birth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMotherDateOfBirth()
    {
        return $this->mother_date_of_birth;
    }

    /**
     * @param mixed $mother_date_of_birth
     * @return Application
     */
    public function setMotherDateOfBirth($mother_date_of_birth)
    {
        $this->mother_date_of_birth = $mother_date_of_birth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpouseFirstname()
    {
        return $this->spouse_firstname;
    }

    /**
     * @param mixed $spouse_firstname
     * @return Application
     */
    public function setSpouseFirstname($spouse_firstname)
    {
        $this->spouse_firstname = $spouse_firstname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpouseLastname()
    {
        return $this->spouse_lastname;
    }

    /**
     * @param mixed $spouse_lastname
     * @return Application
     */
    public function setSpouseLastname($spouse_lastname)
    {
        $this->spouse_lastname = $spouse_lastname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpouseDateOfBirth()
    {
        return $this->spouse_date_of_birth;
    }

    /**
     * @param mixed $spouse_date_of_birth
     * @return Application
     */
    public function setSpouseDateOfBirth($spouse_date_of_birth)
    {
        $this->spouse_date_of_birth = $spouse_date_of_birth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getApplicationNumber()
    {
        return $this->application_number;
    }

    /**
     * @param mixed $application_number
     * @return Application
     */
    public function setApplicationNumber($application_number)
    {
        $this->application_number = $application_number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransitDepartFrom()
    {
        return $this->transit_depart_from;
    }

    /**
     * @param mixed $transit_depart_from
     * @return Application
     */
    public function setTransitDepartFrom($transit_depart_from)
    {
        $this->transit_depart_from = $transit_depart_from;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransitDepartTo()
    {
        return $this->transit_depart_to;
    }

    /**
     * @param mixed $transit_depart_to
     * @return Application
     */
    public function setTransitDepartTo($transit_depart_to)
    {
        $this->transit_depart_to = $transit_depart_to;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransitReturnFrom()
    {
        return $this->transit_return_from;
    }

    /**
     * @param mixed $transit_return_from
     * @return Application
     */
    public function setTransitReturnFrom($transit_return_from)
    {
        $this->transit_return_from = $transit_return_from;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransitReturnTo()
    {
        return $this->transit_return_to;
    }

    /**
     * @param mixed $transit_return_to
     * @return Application
     */
    public function setTransitReturnTo($transit_return_to)
    {
        $this->transit_return_to = $transit_return_to;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVisaType()
    {
        return $this->visa_type;
    }

    /**
     * @param mixed $visa_type
     * @return Application
     */
    public function setVisaType($visa_type)
    {
        $this->visa_type = $visa_type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstEntryDate()
    {
        return $this->first_entry_date;
    }

    /**
     * @param mixed $first_entry_date
     * @return Application
     */
    public function setFirstEntryDate($first_entry_date)
    {
        $this->first_entry_date = $first_entry_date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstEntryPlace()
    {
        return $this->first_entry_place;
    }

    /**
     * @param mixed $first_entry_place
     * @return Application
     */
    public function setFirstEntryPlace($first_entry_place)
    {
        $this->first_entry_place = $first_entry_place;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstReturningDate()
    {
        return $this->first_returning_date;
    }

    /**
     * @param mixed $first_returning_date
     * @return Application
     */
    public function setFirstReturningDate($first_returning_date)
    {
        $this->first_returning_date = $first_returning_date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstReturningPlace()
    {
        return $this->first_returning_place;
    }

    /**
     * @param mixed $first_returning_place
     * @return Application
     */
    public function setFirstReturningPlace($first_returning_place)
    {
        $this->first_returning_place = $first_returning_place;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastEntryDate()
    {
        return $this->last_entry_date;
    }

    /**
     * @param mixed $last_entry_date
     * @return Application
     */
    public function setLastEntryDate($last_entry_date)
    {
        $this->last_entry_date = $last_entry_date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastEntryPlace()
    {
        return $this->last_entry_place;
    }

    /**
     * @param mixed $last_entry_place
     * @return Application
     */
    public function setLastEntryPlace($last_entry_place)
    {
        $this->last_entry_place = $last_entry_place;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastReturningDate()
    {
        return $this->last_returning_date;
    }

    /**
     * @param mixed $last_returning_date
     * @return Application
     */
    public function setLastReturningDate($last_returning_date)
    {
        $this->last_returning_date = $last_returning_date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastReturningPlace()
    {
        return $this->last_returning_place;
    }

    /**
     * @param mixed $last_returning_place
     * @return Application
     */
    public function setLastReturningPlace($last_returning_place)
    {
        $this->last_returning_place = $last_returning_place;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSponsorshipFullname()
    {
        return $this->sponsorship_fullname;
    }

    /**
     * @param mixed $sponsorship_fullname
     * @return Application
     */
    public function setSponsorshipFullname($sponsorship_fullname)
    {
        $this->sponsorship_fullname = $sponsorship_fullname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSponsorshipAddress()
    {
        return $this->sponsorship_address;
    }

    /**
     * @param mixed $sponsorship_address
     * @return Application
     */
    public function setSponsorshipAddress($sponsorship_address)
    {
        $this->sponsorship_address = $sponsorship_address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSponsorshipPhonenumber()
    {
        return $this->sponsorship_phonenumber;
    }

    /**
     * @param mixed $sponsorship_phonenumber
     * @return Application
     */
    public function setSponsorshipPhonenumber($sponsorship_phonenumber)
    {
        $this->sponsorship_phonenumber = $sponsorship_phonenumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSponsorshipGarantee()
    {
        return $this->sponsorship_garantee;
    }

    /**
     * @param mixed $sponsorship_garantee
     * @return Application
     */
    public function setSponsorshipGarantee($sponsorship_garantee)
    {
        $this->sponsorship_garantee = $sponsorship_garantee;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * @param mixed $profession
     * @return Application
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFatherFirstname()
    {
        return $this->father_firstname;
    }

    /**
     * @param mixed $father_firstname
     * @return Application
     */
    public function setFatherFirstname($father_firstname)
    {
        $this->father_firstname = $father_firstname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFatherLastname()
    {
        return $this->father_lastname;
    }

    /**
     * @param mixed $father_lastname
     * @return Application
     */
    public function setFatherLastname($father_lastname)
    {
        $this->father_lastname = $father_lastname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFatherNationality()
    {
        return $this->father_nationality;
    }

    /**
     * @param mixed $father_nationality
     * @return Application
     */
    public function setFatherNationality($father_nationality)
    {
        $this->father_nationality = $father_nationality;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMotherFirstname()
    {
        return $this->mother_firstname;
    }

    /**
     * @param mixed $mother_firstname
     * @return Application
     */
    public function setMotherFirstname($mother_firstname)
    {
        $this->mother_firstname = $mother_firstname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMotherLastname()
    {
        return $this->mother_lastname;
    }

    /**
     * @param mixed $mother_lastname
     * @return Application
     */
    public function setMotherLastname($mother_lastname)
    {
        $this->mother_lastname = $mother_lastname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMotherNationality()
    {
        return $this->mother_nationality;
    }

    /**
     * @param mixed $mother_nationality
     * @return Application
     */
    public function setMotherNationality($mother_nationality)
    {
        $this->mother_nationality = $mother_nationality;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassportType()
    {
        return $this->passport_type;
    }

    /**
     * @param mixed $passport_type
     * @return Application
     */
    public function setPassportType($passport_type)
    {
        $this->passport_type = $passport_type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassportIssuedate()
    {
        return $this->passport_issuedate;
    }

    /**
     * @param mixed $passport_issuedate
     * @return Application
     */
    public function setPassportIssuedate($passport_issuedate)
    {
        $this->passport_issuedate = $passport_issuedate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassportExpirydate()
    {
        return $this->passport_expirydate;
    }

    /**
     * @param mixed $passport_expirydate
     * @return Application
     */
    public function setPassportExpirydate($passport_expirydate)
    {
        $this->passport_expirydate = $passport_expirydate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassportIssueby()
    {
        return $this->passport_issueby;
    }

    /**
     * @param mixed $passport_issueby
     * @return Application
     */
    public function setPassportIssueby($passport_issueby)
    {
        $this->passport_issueby = $passport_issueby;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResidencyCardnumber()
    {
        return $this->residency_cardnumber;
    }

    /**
     * @param mixed $residency_cardnumber
     * @return Application
     */
    public function setResidencyCardnumber($residency_cardnumber)
    {
        $this->residency_cardnumber = $residency_cardnumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResidencyExpirationdate()
    {
        return $this->residency_expirationdate;
    }

    /**
     * @param mixed $residency_expirationdate
     * @return Application
     */
    public function setResidencyExpirationdate($residency_expirationdate)
    {
        $this->residency_expirationdate = $residency_expirationdate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPurposeOfTravel()
    {
        return $this->purpose_of_travel;
    }

    /**
     * @param mixed $purpose_of_travel
     * @return Application
     */
    public function setPurposeOfTravel($purpose_of_travel)
    {
        $this->purpose_of_travel = $purpose_of_travel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpouseName()
    {
        return $this->spouse_name;
    }

    /**
     * @param mixed $spouse_name
     * @return Application
     */
    public function setSpouseName($spouse_name)
    {
        $this->spouse_name = $spouse_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpouseNationality()
    {
        return $this->spouse_nationality;
    }

    /**
     * @param mixed $spouse_nationality
     * @return Application
     */
    public function setSpouseNationality($spouse_nationality)
    {
        $this->spouse_nationality = $spouse_nationality;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     * @return Application
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return Application
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return Application
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getApplicant(): ?User
    {
        return $this->applicant;
    }

    /**
     * @param User|null $applicant
     * @return Application
     */
    public function setApplicant(?User $applicant): Application
    {
        $this->applicant = $applicant;
        return $this;
    }

    /**
     * @return \DateTime|\DateTimeInterface|null
     */
    public function getApplicationDate(): \DateTime|\DateTimeInterface|null
    {
        return $this->application_date;
    }

    /**
     * @param \DateTime|\DateTimeInterface|null $application_date
     * @return Application
     */
    public function setApplicationDate(\DateTime|\DateTimeInterface|null $application_date): Application
    {
        $this->application_date = $application_date;
        return $this;
    }

    /**
     * @return \DateTime|\DateTimeInterface|null
     */
    public function getDateCreated(): \DateTime|\DateTimeInterface|null
    {
        return $this->date_created;
    }

    /**
     * @param \DateTime|\DateTimeInterface|null $date_created
     * @return Application
     */
    public function setDateCreated(\DateTime|\DateTimeInterface|null $date_created): Application
    {
        $this->date_created = $date_created;
        return $this;
    }

    /**
     * @return Application|null
     */
    public function getParent(): ?Application
    {
        return $this->parent;
    }

    /**
     * @param Application|null $parent
     * @return Application
     */
    public function setParent(?Application $parent): Application
    {
        $this->parent = $parent;
        return $this;
    }


}
