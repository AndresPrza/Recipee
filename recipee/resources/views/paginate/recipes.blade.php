<?php 
    use App\Models\User;
?>

@foreach($recipes as $recipe)

        <?php 
            $author = User::find($recipe->user_id);
        ?>

        <a href="{{ route('view.recipe', $recipe->id) }}" class="recipe-min hvr-float-shadow mmbr-bg-hvr">
            <img src="{{ asset($recipe->thumbnail) }}" alt="{{ $recipe->title }}" class="object-cover w-full h-1/2" style="border-top-left-radius: 18px; border-top-right-radius: 18px;">
            <div class="p-2">
                <p style="color:rgba(255, 255, 255,0.8)" class="text-sm t-0 l-0">
                    {{$author->name}}
                </p>
                <p style="" class="text-base font-semibold text-white">
                    {{$recipe->title}}
                </p>
            </div>
        </a>

@endforeach