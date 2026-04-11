import os

base_path = "laravel_app/app/Models"

models = {
    "Signup": {
        "table": "user_signup",
        "fillable": ["firstname", "lastname", "phoneno", "email", "password"],
        "relations": """
    public function orders() {
        return $this->hasMany(Order::class, 'uid_id', 'id');
    }
    
    // For Auth::attempt to work, map 'password' column implicitly, but Laravel uses 'password' by default.
    // Also use Authenticatable instead of Model.
"""
    },
    "Student": {
        "table": "user_student",
        "fillable": ["name", "email", "subject", "message"],
        "relations": ""
    },
    "Booking": {
        "table": "user_booking",
        "fillable": ["name", "email", "mobileno", "joiningdate", "adult", "specialrequest"],
        "relations": ""
    },
    "Blog": {
        "table": "user_blog",
        "fillable": ["image", "price", "bed", "title", "detail"],
        "relations": ""
    },
    "Team": {
        "table": "user_team",
        "fillable": ["image", "name", "dsg"],
        "relations": ""
    },
    "Test": {
        "table": "user_test",
        "fillable": ["message", "image", "name", "dsg"],
        "relations": ""
    },
    "Apt": {
        "table": "user_apt",
        "fillable": ["name", "email", "phn", "date", "time", "msg"],
        "relations": ""
    },
    "Newsletter": {
        "table": "user_newsletter",
        "fillable": ["email"],
        "relations": ""
    },
    "Cout": {
        "table": "user_cout",
        "fillable": ["roomname", "bed", "priceperb", "deposite", "total"],
        "relations": ""
    },
    "Order": {
        "table": "user_order",
        "fillable": ["uid_id", "amt", "email", "firstname"],
        "relations": """
    public function user() {
        return $this->belongsTo(Signup::class, 'uid_id', 'id');
    }
"""
    },
    "BlogOrder": {
        "table": "user_blogorder",
        "fillable": ["order_id", "blog_item_id", "quantity"],
        "relations": """
    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function blog() {
        return $this->belongsTo(Blog::class, 'blog_item_id', 'id');
    }
"""
    }
}

os.makedirs(base_path, exist_ok=True)

for model_name, info in models.items():
    if model_name == "Signup":
        base_class = "use Illuminate\\Foundation\\Auth\\User as Authenticatable;\n\nclass Signup extends Authenticatable"
    else:
        base_class = "use Illuminate\\Database\\Eloquent\\Model;\n\nclass " + model_name + " extends Model"

    content = f"""<?php

namespace App\Models;

{base_class}
{{
    protected $table = '{info['table']}';
    public $timestamps = false; // Disable default timestamps as Django didn't use them

    protected $fillable = {str(info['fillable']).replace("'", '"').replace("[", "[").replace("]", "]")};
{info['relations']}
}}
"""
    with open(f"{base_path}/{model_name}.php", "w") as f:
        f.write(content)

print("Generated Laravel Models successfully.")
