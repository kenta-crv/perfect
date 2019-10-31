class CallsController < ApplicationController
  before_action :load_customer
  before_action :load_call, only: [:edit,:update,:show,:destroy]
  before_action :authenticate_admin!
  def load_customer
    @customer = Customer.find(params[:customer_id])
  end

  def load_call
    @call = Call.find(params[:id])
  end

  def edit
  end

  def update
    if @call.update(call_params)
      redirect_to customer_path(@customer)
    else
      render 'edit'
    end
  end

  def create
	  #@customer = Customer.find(params[:customer_id])
  	if @customer.calls.create(call_params)
	    redirect_to customer_path(@customer)
    end
  end

  def destroy
    @customer = Customer.find(params[:customer_id])
    @call = @customer.calls.find(params[:id])
    @call.destroy
    redirect_to customer_path(@customer)
  end

  private
 	def call_params
 		params.require(:call).permit(
 		:statu, #ステータス
 		:time, #再コール
 		:comment, #コメント
    :item_select => []
  ).merge(admin: current_admin)
 	end

 end