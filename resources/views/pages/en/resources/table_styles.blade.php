<x-page title="Table styles" :sectionMenu="$sectionMenu ?? null">

<x-p>
    Using resources you can customize the color for <code>tr</code> and <code>td</code> for tables with data
</x-p>

<x-code language="php">
namespace MoonShine\Resources;

class PostResource extends Resource
{
    public static string $model = App\Models\Post::class;

    public static string $title = 'Articles';
    //...

    public function trClass(Model $item, int $index): string // [tl! focus:start]
    {
        if($item->id === 1 || $index === 2) {
            return 'green';
        }

        return parent::trClass($item, $index);
    }

    public function tdClass(Model $item, int $index, int $cell): string
    {
        if($cell === 6) {
            return 'red';
        }

        return parent::tdClass($item, $index, $cell);
    } // [tl! focus:end]
    //...
}
</x-code>

@include('pages.en.components.shared.colors')

<x-image theme="light" src="{{ asset('screenshots/table_class.png') }}"></x-image>
<x-image theme="dark" src="{{ asset('screenshots/table_class_dark.png') }}"></x-image>

<x-p>
    You can also add custom styles
</x-p>

<x-code language="php">
namespace MoonShine\Resources;

class PostResource extends Resource
{
    public static string $model = App\Models\Post::class;

    public static string $title = 'Articles';
    //...

    public function trStyles(Model $item, int $index): string // [tl! focus:start]
    {
        if ($item->id === 1 || $index === 2) {
            return 'background: rgba(128, 152, 253, .5);';
        }

        return parent::trStyles($item, $index);
    }

    public function tdStyles(Model $item, int $index, int $cell): string
    {
        if ($cell === 3) {
            return 'background: rgba(128, 253, 163, .5); text-align:center;';
        }

        return parent::tdStyles($item, $index, $cell);
    } // [tl! focus:end]
    //...
}
</x-code>

<x-image theme="light" src="{{ asset('screenshots/table_style.png') }}"></x-image>
<x-image theme="dark" src="{{ asset('screenshots/table_style_dark.png') }}"></x-image>

</x-page>
