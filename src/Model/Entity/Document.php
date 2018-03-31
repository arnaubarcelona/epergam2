<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Document Entity
 *
 * @property int $id
 * @property string $name
 * @property string $isbn
 * @property int $cdu_id
 * @property int $format_id
 * @property int $collection_id
 * @property int $collection_item
 * @property int $publication_place_id
 * @property string $edition_date
 * @property string $photo
 * @property string $photo_dir
 * @property int $photo_size
 * @property string $photo_type
 * @property string $abstract
 * @property string $notes
 * @property string $url
 * @property int $height
 * @property int $width
 * @property int $volume
 * @property int $pagecount
 * @property int $length
 * @property int $location_id
 * @property int $catalogue_state_id
 * @property int $conservation_state_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Cdus $cdus
 * @property \App\Model\Entity\Format $format
 * @property \App\Model\Entity\Collection $collection
 * @property \App\Model\Entity\PublicationPlace $publication_place
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\CatalogueState $catalogue_state
 * @property \App\Model\Entity\ConservationState $conservation_state
 * @property \App\Model\Entity\Lending[] $lendings
 * @property \App\Model\Entity\Authority[] $authorities
 * @property \App\Model\Entity\Language[] $languages
 * @property \App\Model\Entity\Level[] $levels
 * @property \App\Model\Entity\Publisher[] $publishers
 * @property \App\Model\Entity\Subject[] $subjects
 */
class Document extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'isbn' => true,
        'cdu_id' => true,
        'format_id' => true,
        'collection_id' => true,
        'collection_item' => true,
        'publication_place_id' => true,
        'edition_date' => true,
        'photo' => true,
        'photo_dir' => true,
        'photo_size' => true,
        'photo_type' => true,
        'abstract' => true,
        'notes' => true,
        'url' => true,
        'height' => true,
        'width' => true,
        'volume' => true,
        'pagecount' => true,
        'length' => true,
        'location_id' => true,
        'catalogue_state_id' => true,
        'conservation_state_id' => true,
        'created' => true,
        'modified' => true,
        'cdus' => true,
        'format' => true,
        'collection' => true,
        'publication_place' => true,
        'location' => true,
        'catalogue_state' => true,
        'conservation_state' => true,
        'lendings' => true,
        'authorities' => true,
        'languages' => true,
        'levels' => true,
        'publishers' => true,
        'subjects' => true,        
        'lending_state_id' => true
    ];
}
