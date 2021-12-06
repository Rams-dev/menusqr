<?

namespace App\Repositories;
use App\Models\Cart_details;

class CartRepository extends BaseRepository{
    
    public function __construct(Cart_details $Cart_details){
        parent::__construct($Cart_details);

    }
    
}