# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# Note that this schema.rb definition is the authoritative source for your
# database schema. If you need to create the application database on another
# system, you should be using db:schema:load, not running all the migrations
# from scratch. The latter is a flawed and unsustainable approach (the more migrations
# you'll amass, the slower it'll run and the greater likelihood for issues).
#
# It's strongly recommended that you check this file into your version control system.

ActiveRecord::Schema.define(version: 20190825070515) do

  create_table "admins", force: :cascade do |t|
    t.string "user_name", default: "", null: false
    t.string "email", default: "", null: false
    t.string "encrypted_password", default: "", null: false
    t.string "reset_password_token"
    t.datetime "reset_password_sent_at"
    t.datetime "remember_created_at"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["email"], name: "index_admins_on_email", unique: true
    t.index ["reset_password_token"], name: "index_admins_on_reset_password_token", unique: true
  end

  create_table "calls", force: :cascade do |t|
    t.string "statu"
    t.datetime "time"
    t.string "comment"
    t.integer "customer_id"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["customer_id"], name: "index_calls_on_customer_id"
  end

  create_table "contacts", force: :cascade do |t|
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

  create_table "customers", force: :cascade do |t|
    t.string "company"
    t.string "store"
    t.string "first_name"
    t.string "last_name"
    t.string "first_kana"
    t.string "last_kana"
    t.string "tel"
    t.string "tel2"
    t.string "fax"
    t.string "mobile"
    t.string "industry"
    t.string "mail"
    t.string "url"
    t.string "people"
    t.string "postnumber"
    t.string "address"
    t.string "caption"
    t.string "remarks"
    t.string "status"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

  create_table "faqs", force: :cascade do |t|
    t.string "title"
    t.string "select"
    t.string "contents"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

  create_table "invoices", force: :cascade do |t|
    t.string "status"
    t.string "deadline"
    t.string "payment"
    t.string "subject"
    t.string "item1"
    t.string "item2"
    t.string "item3"
    t.string "item4"
    t.string "item5"
    t.integer "price1"
    t.integer "price2"
    t.integer "price3"
    t.integer "price4"
    t.integer "price5"
    t.integer "quantity1"
    t.integer "quantity2"
    t.integer "quantity3"
    t.integer "quantity4"
    t.integer "quantity5"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.integer "company_id"
  end

  create_table "todos", force: :cascade do |t|
    t.string "execution"
    t.string "title"
    t.string "select"
    t.string "deadline"
    t.string "state"
    t.string "name"
    t.string "contents"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

  create_table "upload_data", force: :cascade do |t|
    t.string "name"
    t.string "file"
    t.integer "company_id"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["company_id"], name: "index_upload_data_on_company_id"
  end

  create_table "upload_files", force: :cascade do |t|
    t.string "name"
    t.string "file"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

end
