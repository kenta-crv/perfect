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
        $this->call(UsersTableSeeder::class);
        $this->call(AdministratorTableSeeder::class);
        $this->call(AccountsTableSeeder::class);
        $this->call(SearchTableSeeder::class);
        $this->call(PropertyTableSeeder::class);
        $this->call(RequestInformationsTableSeeder::class);
        $this->call(TradeStylesTableSeeder::class);
        $this->call(BuildingStructuresTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(PropertyDistributionSiteTableSeeder::class);
        $this->call(PlanOfRentFeeTableSeeder::class);
        $this->call(PlanOfHouseTableSeeder::class);
        $this->call(ArrearsTableSeeder::class);
        $this->call(FavoritesTableSeeder::class);
        $this->call(PropertyInformationTableSeeder::class);
        $this->call(NotificationTableSeeder::class);
        $this->call(CreditCardTableSeeder::class);
        $this->call(SettingScrapingIdTableSeeder::class);
        $this->call(BillingUserSeeder::class);
        // $this->call(SettingScrapingIdTableSeeder::class);
        // $this->call(SrapingTargetTableSeeder::class);
        $this->call(MailSendingListHeadquarterTableSeeder::class);
        $this->call(NotPaymentUserSeeder::class);
        $this->call(GuideSeeder::class);
        $this->call(UnreadSeeder::class);

    }
}
