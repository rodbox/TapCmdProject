<?php

namespace RB\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RB\UserBundle\Entity\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    // * @ORM\Column(type="string", nullable=true) *
    // protected $UserCiv;
    /** @ORM\Column(type="string", nullable=true) **/
    protected $UserLastname;
    /** @ORM\Column(type="string", nullable=true) **/
    protected $UserFirstname;

    /** @ORM\Column(type="string", nullable=true) **/
    protected $UserAdress;

    /** @ORM\Column(type="string", nullable=true) **/
    protected $UserCP;

    /** @ORM\Column(type="string", nullable=true) **/
    protected $UserCity;

    /** @ORM\Column(type="string", nullable=true) **/
    protected $UserCountry;

    /** @ORM\Column(type="boolean", nullable=true) **/
    protected $UserActive;

    // * @ORM\Column(type="string", nullable=true) *
    protected $UserType;

    /** @ORM\Column(type="string", nullable=true) **/
    protected $UserBusinessName;


    /** @ORM\Column(type="datetime", nullable=true) **/
    protected $UserDateCrea;

    /** @ORM\Column(type="datetime", nullable=true) **/
    protected $UserDateLastConnect;

    /** @ORM\Column(type="datetime", nullable=true) **/
    protected $UserDateUpd;

    // * @ORM\Column(type="array") *
    // protected $UserLang;

    /** @ORM\Column(type="string", nullable=true) **/
    protected $UserTel;

    /** @ORM\Column(type="string", nullable=true) **/
    protected $UserSkype;


    // /** @ORM\Column(type="string", nullable=true) **/
    // protected $UserFacebook;

    // * @ORM\Column(type="string", nullable=true) *
    // protected $UserPinterest;

    // /** @ORM\Column(type="datetime", nullable=true) **/
    // protected $UserDateBorn;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set UserCiv
     *
     * @param string $userCiv
     * @return User
     */
    public function setUserCiv($userCiv)
    {
        $this->UserCiv = $userCiv;

        return $this;
    }

    /**
     * Get UserCiv
     *
     * @return string
     */
    public function getUserCiv()
    {
        return $this->UserCiv;
    }

    /**
     * Set UserLastname
     *
     * @param string $userLastname
     * @return User
     */
    public function setUserLastname($userLastname)
    {
        $this->UserLastname = $userLastname;

        return $this;
    }

    /**
     * Get UserLastname
     *
     * @return string
     */
    public function getUserLastname()
    {
        return $this->UserLastname;
    }

    /**
     * Set UserFirstname
     *
     * @param string $userFirstname
     * @return User
     */
    public function setUserFirstname($userFirstname)
    {
        $this->UserFirstname = $userFirstname;

        return $this;
    }

    /**
     * Get UserFirstname
     *
     * @return string
     */
    public function getUserFirstname()
    {
        return $this->UserFirstname;
    }

    /**
     * Set UserAdress
     *
     * @param string $userAdress
     * @return User
     */
    public function setUserAdress($userAdress)
    {
        $this->UserAdress = $userAdress;

        return $this;
    }

    /**
     * Get UserAdress
     *
     * @return string
     */
    public function getUserAdress()
    {
        return $this->UserAdress;
    }

    /**
     * Set UserCP
     *
     * @param string $userCP
     * @return User
     */
    public function setUserCP($userCP)
    {
        $this->UserCP = $userCP;

        return $this;
    }

    /**
     * Get UserCP
     *
     * @return string
     */
    public function getUserCP()
    {
        return $this->UserCP;
    }

    /**
     * Set UserCity
     *
     * @param string $userCity
     * @return User
     */
    public function setUserCity($userCity)
    {
        $this->UserCity = $userCity;

        return $this;
    }

    /**
     * Get UserCity
     *
     * @return string
     */
    public function getUserCity()
    {
        return $this->UserCity;
    }

    /**
     * Set UserCountry
     *
     * @param string $userCountry
     * @return User
     */
    public function setUserCountry($userCountry)
    {
        $this->UserCountry = $userCountry;

        return $this;
    }

    /**
     * Get UserCountry
     *
     * @return string
     */
    public function getUserCountry()
    {
        return $this->UserCountry;
    }

    /**
     * Set UserType
     *
     * @param string $userType
     * @return User
     */
    public function setUserType($userType)
    {
        $this->UserType = $userType;

        return $this;
    }

    /**
     * Get UserType
     *
     * @return string
     */
    public function getUserType()
    {
        return $this->UserType;
    }

    /**
     * Set UserDateCrea
     *
     * @param \DateTime $userDateCrea
     * @return User
     */
    public function setUserDateCrea($userDateCrea)
    {
        $this->UserDateCrea = $userDateCrea;

        return $this;
    }

    /**
     * Get UserDateCrea
     *
     * @return \DateTime
     */
    public function getUserDateCrea()
    {
        return $this->UserDateCrea;
    }

    /**
     * Set UserDateLastConnect
     *
     * @param \DateTime $userDateLastConnect
     * @return User
     */
    public function setUserDateLastConnect($userDateLastConnect)
    {
        $this->UserDateLastConnect = $userDateLastConnect;

        return $this;
    }

    /**
     * Get UserDateLastConnect
     *
     * @return \DateTime
     */
    public function getUserDateLastConnect()
    {
        return $this->UserDateLastConnect;
    }

    /**
     * Set UserDateUpd
     *
     * @param \DateTime $userDateUpd
     * @return User
     */
    public function setUserDateUpd($userDateUpd)
    {
        $this->UserDateUpd = $userDateUpd;

        return $this;
    }

    /**
     * Get UserDateUpd
     *
     * @return \DateTime
     */
    public function getUserDateUpd()
    {
        return $this->UserDateUpd;
    }

    /**
     * Set UserLang
     *
     * @param array $userLang
     * @return User
     */
    public function setUserLang($userLang)
    {
        $this->UserLang = $userLang;

        return $this;
    }

    /**
     * Get UserLang
     *
     * @return array
     */
    public function getUserLang()
    {
        return $this->UserLang;
    }

    /**
     * Set UserTel
     *
     * @param string $userTel
     * @return User
     */
    public function setUserTel($userTel)
    {
        $this->UserTel = $userTel;

        return $this;
    }

    /**
     * Get UserTel
     *
     * @return string
     */
    public function getUserTel()
    {
        return $this->UserTel;
    }

    /**
     * Set UserActive
     *
     * @param boolean $userActive
     * @return User
     */
    public function setUserActive($userActive)
    {
        $this->UserActive = $userActive;

        return $this;
    }

    /**
     * Get UserActive
     *
     * @return boolean
     */
    public function getUserActive()
    {
        return $this->UserActive;
    }

    /**
     * Set UserBusinessName
     *
     * @param string $userBusinessName
     * @return User
     */
    public function setUserBusinessName($userBusinessName)
    {
        $this->UserBusinessName = $userBusinessName;

        return $this;
    }

    /**
     * Get UserBusinessName
     *
     * @return string
     */
    public function getUserBusinessName()
    {
        return $this->UserBusinessName;
    }

    /**
     * Set UserSkype
     *
     * @param string $userSkype
     * @return User
     */
    public function setUserSkype($userSkype)
    {
        $this->UserSkype = $userSkype;

        return $this;
    }

    /**
     * Get UserSkype
     *
     * @return string
     */
    public function getUserSkype()
    {
        return $this->UserSkype;
    }
}
