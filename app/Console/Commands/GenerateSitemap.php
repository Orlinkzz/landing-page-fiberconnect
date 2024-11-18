<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:generate-sitemap';
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';
    protected $description = 'Generate sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Initialize sitemap
        $sitemap = Sitemap::create();

        // Static pages with detailed configurations
        $sitemap
            ->add(Url::create('/')
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(1.0))
            ->add(Url::create('/kategori-berita')
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8))
            ->add(Url::create('/paket-internet')
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.5))
            ->add(Url::create('/paket-data-center')
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.5))
            ->add(Url::create('/hubungi-kami')
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.4))
            ->add(Url::create('/sarat-dan-ketentuan')
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.3))
            ->add(Url::create('/metode-pembayaran')
                ->setLastModificationDate(Carbon::now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.3));

        // Dynamic pages with loop for each model
        $karir = \App\Models\Karir::all();
        foreach ($karir as $item) {
            $sitemap->add(
                Url::create("/karir/{$item->id}")
                    ->setLastModificationDate($item->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.7)
            );
        }

        $promo = \App\Models\Promo::all();
        foreach ($promo as $item) {
            $sitemap->add(
                Url::create("/promo/{$item->id}")
                    ->setLastModificationDate($item->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.6)
            );
        }

        $news = \App\Models\Berita::all();
        foreach ($news as $item) {
            $sitemap->add(
                Url::create("/news/{$item->id}")
                    ->setLastModificationDate($item->updated_at ?? Carbon::now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    ->setPriority(0.9)
            );
        }

        $carousel = \App\Models\Carousel::all();
        foreach ($carousel as $item) {
            $sitemap->add(
                Url::create("/carousel/{$item->id}")
                    ->setLastModificationDate($item->updated_at ?? Carbon::now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.5)
            );
        }

        $tentangKami = \App\Models\TentangKami::all();
        foreach ($tentangKami as $item) {
            $sitemap->add(
                Url::create("/tentang-kami/{$item->id}")
                    ->setLastModificationDate($item->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                    ->setPriority(0.4)
            );
        }

        $faqs = \App\Models\Faq::all();
        foreach ($faqs as $item) {
            $sitemap->add(
                Url::create("/faq/{$item->id}")
                    ->setLastModificationDate($item->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                    ->setPriority(0.3)
            );
        }

        // Write sitemap to file
        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
