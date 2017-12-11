<?php
class Cocktail
{
    private $ckt_st_name, $ckt_st_recipe, $ckt_st_serve, $ckt_st_category, $ckt_id_user, $created_at;

    public function __construct($ckt_st_name, $ckt_st_recipe, $ckt_st_serve, $ckt_st_category, $ckt_id_user, $created_at)
    {
        $this->ckt_st_name = $ckt_st_name;
        $this->ckt_st_recipe = $ckt_st_recipe;
        $this->ckt_st_serve = $ckt_st_serve;
        $this->ckt_st_category = $ckt_st_category;
        $this->ckt_id_user = $ckt_id_user;
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getCktStName()
    {
        return $this->ckt_st_name;
    }

    /**
     * @param mixed $ckt_st_name
     */
    public function setCktStName($ckt_st_name)
    {
        $this->ckt_st_name = $ckt_st_name;
    }

    /**
     * @return mixed
     */
    public function getCktStRecipe()
    {
        return $this->ckt_st_recipe;
    }

    /**
     * @param mixed $ckt_st_recipe
     */
    public function setCktStRecipe($ckt_st_recipe)
    {
        $this->ckt_st_recipe = $ckt_st_recipe;
    }

    /**
     * @return mixed
     */
    public function getCktStServe()
    {
        return $this->ckt_st_serve;
    }

    /**
     * @param mixed $ckt_st_serve
     */
    public function setCktStServe($ckt_st_serve)
    {
        $this->ckt_st_serve = $ckt_st_serve;
    }

    /**
     * @return mixed
     */
    public function getCktStCategory()
    {
        return $this->ckt_st_category;
    }

    /**
     * @param mixed $ckt_st_category
     */
    public function setCktStCategory($ckt_st_category)
    {
        $this->ckt_st_category = $ckt_st_category;
    }

    /**
     * @return mixed
     */
    public function getCktIdUser()
    {
        return $this->ckt_id_user;
    }

    /**
     * @param mixed $ckt_id_user
     */
    public function setCktIdUser($ckt_id_user)
    {
        $this->ckt_id_user = $ckt_id_user;
    }

}
?>