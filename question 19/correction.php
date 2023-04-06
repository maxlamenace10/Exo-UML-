<?php 
class Technician
{
    public function __construct(private array $surbordinates = [],  private ?Technician $superior = null) {
    }

    /**
     * Ajoute un subordonné au technicien courant
     * @param Technician $subordinate  ajoute un item de type Technician à la
     *                                 collection
     */
    public function addSubordinate(Technician $subordinate): bool
    {
        if($subordinate === $this) {
            throw new Exception (" Un techn ne peut pas etre son propre subordonné")
        }

        if (!in_array($subordinate, $this->subordinates, true)) {
            $this->subordinates[] = $subordinate;

            return true;
        }

        return false;
    }

    /**
     * Retire un subordonné au technicien courant
     * @param Technician $subordinate retire l'item de la collection
     */
    public function removeSubordinate(Technician $subordinate): bool
    {
        $key = array_search($subordinate, $this->subordinates, true);

        if ($key !== false) {
            unset($this->subordinates[$key]);

            return true;
        }

        return false;
    }

    /**
     * Initialise la collection de subordonnés du technicien courant
     *
     * @param array $subordinates collection d'objets de type Technician
     *
     * @return $this
     */
    public function setSubordinates(array $subordinates): self
    {
        
        $this->surbordinates = [];

        foreach ($subordinates as $subordinate) {
            $this->addSubordinate($subordinate);
        }

        return $this;
    }

    /**
     * Retourne la collection de subordonnés du technicien courant
     * @return Technician[]
     */
    public function getSubordinates(): array
    {
        return $this->subordinates;
    }

    /**
     * Retourne le supérieur du technicien courant
     * @return Technician|null
     */
    public function getSuperior(): ?Technician
    {
        return $this->superior;
    }


    /**
     * Affecte un supérieur au technicien courant
     * @param Technician|null $superior
     *
     * @return Technician
     */
    public function setSuperior(?Technician $superior): Technician
    {

        // Controler que le supérieur du supérieur du technicien courant ne soit pas lui meme. 

        if($superior === $this) {
            throw new Exception("un technicien ne peut pas etre son propre supérieur");
        }
        
        // Mise à jour de l'ancien supérieur

        if($this->superior != null) {
            $this->superior->removeSubordinate($this);
        }

        if($superior != null) {
            $superior->addSubordinate($this);
        }
        // Mise à jour le nouveau supérieur

        $this->superior = $superior;

        return $this;
    }

}