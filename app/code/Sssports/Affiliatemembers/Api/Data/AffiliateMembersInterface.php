<?php


namespace Sssports\Affiliatemembers\Api\Data;

interface AffiliateMembersInterface
{

    const STATUS = 'status';
    const UPDATED_AT = 'updated_at';
    const PROFILE_IMAGE = 'profile_image';
    const AFFILIATE_MEMBERS_ID = 'affiliate_members_id';
    const CREATED_AT = 'created_at';
    const NAME = 'name';


    /**
     * Get affiliate_members_id
     * @return string|null
     */
    
    public function getAffiliateMembersId();

    /**
     * Set affiliate_members_id
     * @param string $affiliate_members_id
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface
     */
    
    public function setAffiliateMembersId($affiliateMembersId);

    /**
     * Get name
     * @return string|null
     */
    
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface
     */
    
    public function setName($name);

    /**
     * Get status
     * @return string|null
     */
    
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface
     */
    
    public function setStatus($status);

    /**
     * Get profile_image
     * @return string|null
     */
    
    public function getProfileImage();

    /**
     * Set profile_image
     * @param string $profile_image
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface
     */
    
    public function setProfileImage($profile_image);

    /**
     * Get created_at
     * @return string|null
     */
    
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $created_at
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface
     */
    
    public function setCreatedAt($created_at);

    /**
     * Get updated_at
     * @return string|null
     */
    
    public function getUpdatedAt();

    /**
     * Set updated_at
     * @param string $updated_at
     * @return \Sssports\Affiliatemembers\Api\Data\AffiliateMembersInterface
     */
    
    public function setUpdatedAt($updated_at);
}
