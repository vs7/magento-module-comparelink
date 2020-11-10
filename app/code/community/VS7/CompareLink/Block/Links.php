<?php

class VS7_CompareLink_Block_Links extends Mage_Core_Block_Template
{
    /**
     * Add link on compare page in parent block
     *
     * @return VS7_CompareLink_Block_Links
     */
    public function addCompareLink()
    {
        $parentBlock = $this->getParentBlock();
        if ($parentBlock) {
            $count = $this->helper('catalog/product_compare')->getItemCollection()->getSize();
            if ($count >= 1) {
                $css = 'class="top-link-compare top-link-compare-added ' . ($count == 1 ? 'no-click' : '') . '"';
                $text = $this->__('Compare Products (%d)', $count);
            }
            else {
                $css = 'class="top-link-compare no-click"';
                $text = $this->__('Compare Products');
            }
            $fullUrl = Mage::helper('catalog/product_compare')->getListUrl();
            $url = substr($fullUrl, strpos($fullUrl, 'catalog'));
            $parentBlock->addLink($text, 'catalog/product_compare/index', $text, true, array(), 30, null, $css);
        }
        return $this;
    }

    public function addWishlistLink()
    {
        $parentBlock = $this->getParentBlock();
        if ($parentBlock && $this->helper('wishlist')->isAllow()) {
            $count = $this->helper('wishlist')->getItemCount();
            if ($count > 1) {
                $css = 'class="top-link-wishlist top-link-wishlist-added"';
                $text = $this->__('My Wishlist (%d items)', $count);
            }
            else if ($count == 1) {
                $css = 'class="top-link-wishlist top-link-wishlist-added"';
                $text = $this->__('My Wishlist (%d item)', $count);
            }
            else {
                $css = 'class="top-link-wishlist"';
                $text = $this->__('My Wishlist');
            }
            $parentBlock->addLink($text, 'wishlist', $text, true, array(), 30, null, $css);
        }
        return $this;
    }
}