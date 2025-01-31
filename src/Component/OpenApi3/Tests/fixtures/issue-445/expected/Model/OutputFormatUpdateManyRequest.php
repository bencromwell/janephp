<?php

namespace PicturePark\API\Model;

class OutputFormatUpdateManyRequest
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * Output format items to be modified.
     *
     * @var list<OutputFormatUpdateManyRequestItem>|null
     */
    protected $items;
    /**
     * Output format items to be modified.
     *
     * @return list<OutputFormatUpdateManyRequestItem>|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }
    /**
     * Output format items to be modified.
     *
     * @param list<OutputFormatUpdateManyRequestItem>|null $items
     *
     * @return self
     */
    public function setItems(?array $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;
        return $this;
    }
}