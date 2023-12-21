<?php
require_once 'models/Item.php';
require_once 'helpers/session.helper.php';

class MenuController
{
    private $itemModel;
    private $breakfastModel;
    private $mainModel;
    private $drinkModel;
    private $sideModel;

    public function __construct()
    {
    }

    public function getMenu()
    {

        $breakfastItems = BreakfastItem::getBreakfastItems();
        $mainItems = MainItem::getMainItems();
        $drinkItems = DrinkItem::getDrinkItems();
        $sideItems = SideItem::getSideItems();
        $dessertItems = DessertItem::getDessertItems();


        // Extract unique categories for each set of items
        $breakfastCategories = !empty($breakfastItems) ? $this->extractUniqueCategories($breakfastItems) : [];
        $mainCategories = !empty($mainItems) ? $this->extractUniqueCategories($mainItems) : [];
        $drinkCategories = !empty($drinkItems) ? $this->extractUniqueCategories($drinkItems) : [];
        $sideCategories = !empty($sideItems) ? $this->extractUniqueCategories($sideItems) : [];
        $dessertCategories = !empty($dessertItems) ? $this->extractUniqueCategories($dessertItems) : [];

        // Include the view file and pass the variables to it
        include 'views/menu.php';

    }

    public static function extractUniqueCategories($categoryItems)
    {
        $uniqueCategories = [];

        foreach ($categoryItems as $item) {
            $category = $item->getCategory();
            if (!in_array($category, $uniqueCategories)) {
                $uniqueCategories[] = $category;
            }
        }
        return $uniqueCategories;
    }


    public static function generateItemsHTML($Categories, $Items, $itemType)
    {
        $html = "<section class='menu-section ftco-section'>
								<div class='container'>
									<div class='row'>";

        foreach ($Categories as $category) {
            $html .= "<div class='col-md-6 mb-5 pb-3'>
									<h3 class='mb-5 heading-pricing ftco-animate'>" . $category . "</h3>";

            foreach ($Items as $item) {
                if ($item->getCategory() == $category) {
                    // Get the first 80 characters of the description
                    $shortDescription = substr($item->getDescription(), 0, 80);

                    // Check if the description was truncated, and add dots accordingly
                    if (strlen($item->getDescription()) > 80) {
                        $shortDescription .= '...';
                    }

                    $html .= '<div class="item pricing-entry d-flex ftco-animate" onclick="window.location.href=\'product?type=' .
                        $itemType . '&id=' . $item->getID() . '\'">
                                <div class="img" style="background-image: url(' . $item->getImagePath() . ');"></div>
                                <div class="desc pl-3">
                                    <div class="d-flex text align-items-center">
                                        <h3><span class="item-name">' . $item->getName() . '</span></h3>
                                        <span class="price">' . $item->getPrice() . ' L.E</span>
                                    </div>
                                    <div class="d-block">
                                        <p>' . htmlspecialchars($shortDescription) . '</p>
                                    </div>
                                </div>
                            </div>';
                }
            }


            $html .= '</div>';
        }

        $html .= '</div>
							</div>
						</section>';

        return $html;
    }
}