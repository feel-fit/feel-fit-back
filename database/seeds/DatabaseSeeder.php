<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserRolesSeeder::class);
        $this->call(UsersTableSeeder::class);
        //$this->call(MessagesTableSeeder::class);
        //$this->call(DiscountsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        /**$this->call(AddressesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(WishlistsTableSeeder::class);
        $this->call(NutritionalFactsTableSeeder::class);
        $this->call(ShippingsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(StatusOrdersTableSeeder::class);
        $this->call(ShoppingsTableSeeder::class);
        $this->call(DetailShoppingsTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
         **/
    }
}
