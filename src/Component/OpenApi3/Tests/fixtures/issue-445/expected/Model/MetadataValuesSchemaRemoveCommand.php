<?php

namespace PicturePark\API\Model;

class MetadataValuesSchemaRemoveCommand extends MetadataValuesChangeCommandBase
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
}