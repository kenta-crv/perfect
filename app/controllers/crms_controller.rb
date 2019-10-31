class CrmsController < ApplicationController
  before_action :authenticate_admin!
  def index
    @crms = Crm.all.order(created_at :'desc')
  end

  def show
    @crm = Crm.find(params[:id])
  end

  def new
    @crm = Crm.new
  end

  def create
    @crm = Crm.new(crm_params)
    if @crm.save
      redirect_to crms_path
    else
      render 'new'
    end
  end

  def edit
    @crm = Crm.find(params[:id])
  end

  def update
    @crm = Crm.find(params[:id])
    if @crm.update(crm_params)
      redirect_to crm_path
    else
      render 'edit'
    end
  end

  def destroy
    @crm = Crm.find(params[:id])
    @crm.destroy
      redirect_to crms_path
  end

  def crm_params
    params.require[:crm].permit(
      :company, #会社名
      :first_name, #代表者苗字
      :last_name, #代表者名前
      :first_kana, #代表者ミョウジ
      :last_kana, #代表者カナ
      :tel, #電話番号
      :mobile, #携帯番号
      :fax, #FAX番号
      :mail, #メールアドレス
      :postnumber, #郵便番号
      :prefecture, #都道府県
      :city, #市町村
      :town, #番地
      :building, #ビル名・号室
      :item #取引商品
    )
  end
end
