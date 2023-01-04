<?php

// @formatter:off

/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models {

    /**
     * App\Models\Author
     *
     * @property int $id
     * @property string $NameSurname
     * @property string $photo
     * @property string $biography
     * @property string $wikipedia
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read mixed $name_surname
     * @method static \Database\Factories\AuthorFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|Author newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Author newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Author query()
     * @method static \Illuminate\Database\Eloquent\Builder|Author whereBiography($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Author whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Author whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Author whereNameSurname($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Author wherePhoto($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Author whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Author whereWikipedia($value)
     */
    class Author extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Binding
     *
     * @property int $id
     * @property string $name
     * @method static \Illuminate\Database\Eloquent\Builder|Binding newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Binding newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Binding query()
     * @method static \Illuminate\Database\Eloquent\Builder|Binding whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Binding whereName($value)
     */
    class Binding extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Book
     *
     * @property int $id
     * @property string $title
     * @property int $page_count
     * @property int $letter_id
     * @property int $language_id
     * @property int $binding_id
     * @property int $format_id
     * @property int $publisher_id
     * @property string $ISBN
     * @property int $quantity_count
     * @property int $rented_count
     * @property int $reserved_count
     * @property string $body
     * @property string $year
     * @property string|null $pdf
     * @property int|null $placeholder
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BookAuthor[] $authors
     * @property-read int|null $authors_count
     * @property-read \App\Models\Binding $binding
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BookCategory[] $categories
     * @property-read int|null $categories_count
     * @property-read \App\Models\Gallery|null $cover
     * @property-read \App\Models\Format $format
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Gallery[] $gallery
     * @property-read int|null $gallery_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BookGenre[] $genres
     * @property-read int|null $genres_count
     * @property-read \App\Models\Language $language
     * @property-read \App\Models\Letter $letter
     * @property-read \App\Models\Publisher $publisher
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rent[] $rent
     * @property-read int|null $rent_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reservation[] $reservations
     * @property-read int|null $reservations_count
     * @method static \Database\Factories\BookFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Book query()
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereBindingId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereBody($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereFormatId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereISBN($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereLanguageId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereLetterId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book wherePageCount($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book wherePdf($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book wherePlaceholder($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book wherePublisherId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereQuantityCount($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereRentedCount($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereReservedCount($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Book whereYear($value)
     */
    class Book extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\BookAuthor
     *
     * @property int $id
     * @property int $book_id
     * @property int $author_id
     * @property-read \App\Models\Author $author
     * @property-read \App\Models\Book $book
     * @method static \Database\Factories\BookAuthorFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor query()
     * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor whereAuthorId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor whereBookId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor whereId($value)
     */
    class BookAuthor extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\BookCategory
     *
     * @property int $id
     * @property int $book_id
     * @property int $category_id
     * @property-read \App\Models\Book $book
     * @property-read \App\Models\Category $category
     * @method static \Database\Factories\BookCategoryFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|BookCategory newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|BookCategory newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|BookCategory query()
     * @method static \Illuminate\Database\Eloquent\Builder|BookCategory whereBookId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|BookCategory whereCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|BookCategory whereId($value)
     */
    class BookCategory extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\BookGenre
     *
     * @property int $id
     * @property int $book_id
     * @property int $genre_id
     * @property-read \App\Models\Genre $genre
     * @method static \Database\Factories\BookGenreFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|BookGenre newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|BookGenre newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|BookGenre query()
     * @method static \Illuminate\Database\Eloquent\Builder|BookGenre whereBookId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|BookGenre whereGenreId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|BookGenre whereId($value)
     */
    class BookGenre extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\BookStatus
     *
     * @property int $id
     * @property string $status
     * @property-read \App\Models\RentStatus|null $rent_status
     * @method static \Illuminate\Database\Eloquent\Builder|BookStatus newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|BookStatus newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|BookStatus query()
     * @method static \Illuminate\Database\Eloquent\Builder|BookStatus whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|BookStatus whereStatus($value)
     */
    class BookStatus extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\CancellationReason
     *
     * @property int $id
     * @property string $name
     * @method static \Illuminate\Database\Eloquent\Builder|CancellationReason newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|CancellationReason newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|CancellationReason query()
     * @method static \Illuminate\Database\Eloquent\Builder|CancellationReason whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|CancellationReason whereName($value)
     */
    class CancellationReason extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Category
     *
     * @property int $id
     * @property string $name
     * @property string $icon
     * @property string $default
     * @property string $description
     * @method static \Database\Factories\CategoryFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Category query()
     * @method static \Illuminate\Database\Eloquent\Builder|Category whereDefault($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Category whereIcon($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
     */
    class Category extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Format
     *
     * @property int $id
     * @property string $name
     * @method static \Illuminate\Database\Eloquent\Builder|Format newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Format newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Format query()
     * @method static \Illuminate\Database\Eloquent\Builder|Format whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Format whereName($value)
     */
    class Format extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Gallery
     *
     * @property int $id
     * @property int $book_id
     * @property string $photo
     * @property int $cover
     * @method static \Database\Factories\GalleryFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|Gallery newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Gallery newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Gallery query()
     * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereBookId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCover($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Gallery wherePhoto($value)
     */
    class Gallery extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Genre
     *
     * @property int $id
     * @property string $name
     * @property string|null $icon
     * @property string $default
     * @property string|null $description
     * @method static \Database\Factories\GenreFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|Genre newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Genre newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Genre query()
     * @method static \Illuminate\Database\Eloquent\Builder|Genre whereDefault($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Genre whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Genre whereIcon($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Genre whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Genre whereName($value)
     */
    class Genre extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\GlobalVariable
     *
     * @property int $id
     * @property string $variable
     * @property string $value
     * @method static \Illuminate\Database\Eloquent\Builder|GlobalVariable newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|GlobalVariable newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|GlobalVariable query()
     * @method static \Illuminate\Database\Eloquent\Builder|GlobalVariable whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|GlobalVariable whereValue($value)
     * @method static \Illuminate\Database\Eloquent\Builder|GlobalVariable whereVariable($value)
     */
    class GlobalVariable extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Language
     *
     * @property int $id
     * @property string $name
     * @method static \Illuminate\Database\Eloquent\Builder|Language newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Language newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Language query()
     * @method static \Illuminate\Database\Eloquent\Builder|Language whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Language whereName($value)
     */
    class Language extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Letter
     *
     * @property int $id
     * @property string $name
     * @method static \Illuminate\Database\Eloquent\Builder|Letter newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Letter newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Letter query()
     * @method static \Illuminate\Database\Eloquent\Builder|Letter whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Letter whereName($value)
     */
    class Letter extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Publisher
     *
     * @property int $id
     * @property string $name
     * @method static \Illuminate\Database\Eloquent\Builder|Publisher newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Publisher newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Publisher query()
     * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereName($value)
     */
    class Publisher extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Rent
     *
     * @property int $id
     * @property int $book_id
     * @property int $rent_user_id
     * @property int $borrow_user_id
     * @property string $issue_date
     * @property string $return_date
     * @property-read \App\Models\Book $book
     * @property-read \App\Models\User $borrow
     * @property-read \App\Models\User $librarian
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RentStatus[] $rent_status
     * @property-read int|null $rent_status_count
     * @method static \Illuminate\Database\Eloquent\Builder|Rent newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Rent newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Rent query()
     * @method static \Illuminate\Database\Eloquent\Builder|Rent whereBookId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Rent whereBorrowUserId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Rent whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Rent whereIssueDate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Rent whereRentUserId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Rent whereReturnDate($value)
     */
    class Rent extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\RentStatus
     *
     * @property int $id
     * @property int $book_status_id
     * @property int $rent_id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\BookStatus $book_status
     * @property-read \App\Models\Rent $rent
     * @method static \Illuminate\Database\Eloquent\Builder|RentStatus newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|RentStatus newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|RentStatus query()
     * @method static \Illuminate\Database\Eloquent\Builder|RentStatus whereBookStatusId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RentStatus whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RentStatus whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RentStatus whereRentId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RentStatus whereUpdatedAt($value)
     */
    class RentStatus extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Reservation
     *
     * @property int $id
     * @property int $book_id
     * @property int $reservationMadeFor_user_id
     * @property int $reservationMadeBy_user_id
     * @property int|null $closeReservation_user_id
     * @property int|null $closure_reason
     * @property string|null $request_date
     * @property string $reservation_date
     * @property string|null $close_date
     * @property-read \App\Models\Book $book
     * @property-read \App\Models\User|null $closed_by
     * @property-read \App\Models\User $made_by
     * @property-read \App\Models\User $made_for
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReservationStatuses[] $reservations
     * @property-read int|null $reservations_count
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation query()
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereBookId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCloseDate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCloseReservationUserId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereClosureReason($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereRequestDate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereReservationDate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereReservationMadeByUserId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereReservationMadeForUserId($value)
     */
    class Reservation extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\ReservationStatuses
     *
     * @property int $id
     * @property int $reservation_id
     * @property int $status_reservations_id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Reservation $reservation
     * @property-read \App\Models\StatusReservation $status
     * @method static \Illuminate\Database\Eloquent\Builder|ReservationStatuses newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|ReservationStatuses newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|ReservationStatuses query()
     * @method static \Illuminate\Database\Eloquent\Builder|ReservationStatuses whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|ReservationStatuses whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|ReservationStatuses whereReservationId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|ReservationStatuses whereStatusReservationsId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|ReservationStatuses whereUpdatedAt($value)
     */
    class ReservationStatuses extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\StatusReservation
     *
     * @property int $id
     * @property string $status
     * @method static \Illuminate\Database\Eloquent\Builder|StatusReservation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|StatusReservation newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|StatusReservation query()
     * @method static \Illuminate\Database\Eloquent\Builder|StatusReservation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|StatusReservation whereStatus($value)
     */
    class StatusReservation extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\User
     *
     * @property int $id
     * @property int $user_type_id
     * @property int|null $user_gender_id
     * @property string $name
     * @property string|null $JMBG
     * @property string $email
     * @property string $username
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property string $password
     * @property string $photo
     * @property string|null $remember_token
     * @property \Illuminate\Support\Carbon $last_login_at
     * @property int $login_count
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property int $github
     * @property int $active
     * @property-read \App\Models\UserGender|null $gender
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read int|null $notifications_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
     * @property-read int|null $tokens_count
     * @property-read \App\Models\UserType $type
     * @method static \Database\Factories\UserFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User query()
     * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereGithub($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereJMBG($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereLoginCount($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoto($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUserGenderId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUserTypeId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
     */
    class User extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\UserGender
     *
     * @property int $id
     * @property string $name
     * @method static \Illuminate\Database\Eloquent\Builder|UserGender newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|UserGender newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|UserGender query()
     * @method static \Illuminate\Database\Eloquent\Builder|UserGender whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|UserGender whereName($value)
     */
    class UserGender extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\UserLogin
     *
     * @property int $id
     * @property int $user_id
     * @property string $date
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @method static \Illuminate\Database\Eloquent\Builder|UserLogin newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|UserLogin newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|UserLogin query()
     * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereDate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereUserId($value)
     */
    class UserLogin extends \Eloquent
    {
    }
}

namespace App\Models {

    /**
     * App\Models\UserType
     *
     * @property int $id
     * @property string $name
     * @method static \Illuminate\Database\Eloquent\Builder|UserType newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|UserType newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|UserType query()
     * @method static \Illuminate\Database\Eloquent\Builder|UserType whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|UserType whereName($value)
     */
    class UserType extends \Eloquent
    {
    }
}

