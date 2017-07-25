<?php


namespace Sssports\Affiliatemembers\Model;

use Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface;

class AffiliateMembers extends \Magento\Framework\Model\AbstractModel implements AffiliateMembersInterface
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Sssports\Affiliatemembers\Model\ResourceModel\AffiliateMembers');
    }

    /**
     * Get affiliate_members_id
     * @return string
     */
    public function getAffiliateMembersId()
    {
        return $this->getData(self::AFFILIATE_MEMBERS_ID);
    }

    /**
     * Set affiliate_members_id
     * @param string $affiliateMembersId
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface
     */
    public function setAffiliateMembersId($affiliateMembersId)
    {
        return $this->setData(self::AFFILIATE_MEMBERS_ID, $affiliateMembersId);
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get status
     * @return string
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get profile_image
     * @return string
     */
    public function getProfileImage()
    {
        return $this->getData(self::PROFILE_IMAGE);
    }

    /**
     * Set profile_image
     * @param string $profile_image
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface
     */
    public function setProfileImage($profile_image)
    {
        return $this->setData(self::PROFILE_IMAGE, $profile_image);
    }

    /**
     * Get created_at
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set created_at
     * @param string $created_at
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface
     */
    public function setCreatedAt($created_at)
    {
        return $this->setData(self::CREATED_AT, $created_at);
    }

    /**
     * Get updated_at
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set updated_at
     * @param string $updated_at
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface
     */
    public function setUpdatedAt($updated_at)
    {
        return $this->setData(self::UPDATED_AT, $updated_at);
    }
}
