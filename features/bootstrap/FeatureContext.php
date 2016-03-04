<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use PostmanGeneratorBundle\Generator\CollectionGenerator;
use PostmanGeneratorBundle\Model\Collection;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * @var CollectionGenerator
     */
    private $collectionGenerator;

    /**
     * @var Collection
     */
    private $collection;

    /**
     * @param CollectionGenerator $collectionGenerator
     */
    public function __construct(CollectionGenerator $collectionGenerator)
    {
        $this->collectionGenerator = $collectionGenerator;
    }
    /**
     * @When I generate the Postman collection
     */
    public function iGenerateThePostmanCollection()
    {
        $this->collection = $this->collectionGenerator->generate();
    }

    /**
     * @Then /^I should have (\d+) (?:folder|folders) in Postman collection$/
     */
    public function iShouldHaveFolderInPostmanCollection($count)
    {
        if ((int) $count !== count($this->collection->getFolders())) {
            throw new \RuntimeException(sprintf(
                'Expected %d folder(s), but got %d',
                $count,
                count($this->collection->getFolders())
            ));
        }
    }

    /**
     * @Then /^I should have (\d+) (?:request|requests) in Postman collection$/
     */
    public function iShouldHaveRequestInPostmanCollection($count)
    {
        foreach ($this->collection->getFolders() as $folder) {
            if ((int) $count !== count($folder->getRequests())) {
                throw new \RuntimeException(sprintf(
                    'Expected %d request(s), but got %d',
                    $count,
                    count($folder->getRequests())
                ));
            }
        }
    }
}
