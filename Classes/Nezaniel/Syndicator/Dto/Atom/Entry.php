<?php
namespace Nezaniel\Syndicator\Domain\Model\Atom;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Nezaniel.Feeder".       *
 *                                                                        *
 *                                                                        */

/**
 * An Atom entry construct
 *
 * @see http://www.atomenabled.org/developers/syndication/#entry
 */
class Entry {

	/**
	 * @var string
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var \DateTime
	 */
	protected $updated;

	/**
	 * @var \Nezaniel\Syndicator\Domain\Model\Atom\Person
	 */
	protected $authors;

	/**
	 * @var \Nezaniel\Syndicator\Domain\Model\Atom\ContentText
	 */
	protected $content;

	/**
	 * @var \Nezaniel\Syndicator\Domain\Model\Atom\Link
	 */
	protected $link;

	/**
	 * @var \Nezaniel\Syndicator\Domain\Model\Atom\Text
	 */
	protected $summary;

	/**
	 * @var \Nezaniel\Syndicator\Domain\Model\Atom\Category
	 */
	protected $categories;

	/**
	 * @var \Nezaniel\Syndicator\Domain\Model\Atom\Person
	 */
	protected $contributors;

	/**
	 * @var \DateTime
	 */
	protected $published;

	/**
	 * @var \Nezaniel\Syndicator\Domain\Model\Atom\FeedMetadata
	 */
	protected $source;

	/**
	 * @var \Nezaniel\Syndicator\Domain\Model\Atom\Text
	 */
	protected $rights;


	/**
	 * @return string
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param string $id
	 * @return void
	 */
	public function setId(string $id) {
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return void
	 */
	public function setTitle(string $title) {
		$this->title = $title;
	}

	/**
	 * @return \DateTime
	 */
	public function getUpdated() {
		return $this->updated;
	}

	/**
	 * @param \DateTime $updated
	 * @return void
	 */
	public function setUpdated(\DateTime $updated) {
		$this->updated = $updated;
	}

	/**
	 * @return \Nezaniel\Syndicator\Domain\Model\Atom\Person
	 */
	public function getAuthors() {
		return $this->authors;
	}

	/**
	 * @param \Nezaniel\Syndicator\Domain\Model\Atom\Person $authors
	 * @return void
	 */
	public function setAuthors(\Nezaniel\Syndicator\Domain\Model\Atom\Person $authors) {
		$this->authors = $authors;
	}

	/**
	 * @return \Nezaniel\Syndicator\Domain\Model\Atom\ContentText
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @param \Nezaniel\Syndicator\Domain\Model\Atom\ContentText $content
	 * @return void
	 */
	public function setContent(\Nezaniel\Syndicator\Domain\Model\Atom\ContentText $content) {
		$this->content = $content;
	}

	/**
	 * @return \Nezaniel\Syndicator\Domain\Model\Atom\Link
	 */
	public function getLink() {
		return $this->link;
	}

	/**
	 * @param \Nezaniel\Syndicator\Domain\Model\Atom\Link $link
	 * @return void
	 */
	public function setLink(\Nezaniel\Syndicator\Domain\Model\Atom\Link $link) {
		$this->link = $link;
	}

	/**
	 * @return \Nezaniel\Syndicator\Domain\Model\Atom\Text
	 */
	public function getSummary() {
		return $this->summary;
	}

	/**
	 * @param \Nezaniel\Syndicator\Domain\Model\Atom\Text $summary
	 * @return void
	 */
	public function setSummary(\Nezaniel\Syndicator\Domain\Model\Atom\Text $summary) {
		$this->summary = $summary;
	}

	/**
	 * @return \Nezaniel\Syndicator\Domain\Model\Atom\Category
	 */
	public function getCategories() {
		return $this->categories;
	}

	/**
	 * @param \Nezaniel\Syndicator\Domain\Model\Atom\Category $categories
	 * @return void
	 */
	public function setCategories(\Nezaniel\Syndicator\Domain\Model\Atom\Category $categories) {
		$this->categories = $categories;
	}

	/**
	 * @return \Nezaniel\Syndicator\Domain\Model\Atom\Person
	 */
	public function getContributors() {
		return $this->contributors;
	}

	/**
	 * @param \Nezaniel\Syndicator\Domain\Model\Atom\Person $contributors
	 * @return void
	 */
	public function setContributors(\Nezaniel\Syndicator\Domain\Model\Atom\Person $contributors) {
		$this->contributors = $contributors;
	}

	/**
	 * @return \DateTime
	 */
	public function getPublished() {
		return $this->published;
	}

	/**
	 * @param \DateTime $published
	 * @return void
	 */
	public function setPublished(\DateTime $published) {
		$this->published = $published;
	}

	/**
	 * @return \Nezaniel\Syndicator\Domain\Model\Atom\FeedMetadata
	 */
	public function getSource() {
		return $this->source;
	}

	/**
	 * @param \Nezaniel\Syndicator\Domain\Model\Atom\FeedMetadata $source
	 * @return void
	 */
	public function setSource(\Nezaniel\Syndicator\Domain\Model\Atom\FeedMetadata $source) {
		$this->source = $source;
	}

	/**
	 * @return \Nezaniel\Syndicator\Domain\Model\Atom\Text
	 */
	public function getRights() {
		return $this->rights;
	}

	/**
	 * @param \Nezaniel\Syndicator\Domain\Model\Atom\Text $rights
	 * @return void
	 */
	public function setRights(\Nezaniel\Syndicator\Domain\Model\Atom\Text $rights) {
		$this->rights = $rights;
	}

	/**
	 * @param \XMLWriter $feedWriter
	 * @return void
	 */
	public function toXML(\XMLWriter $feedWriter, $tagName = 'entry') {

	}

}
?>