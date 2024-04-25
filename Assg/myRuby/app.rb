# sudo apt-get update
# sudo apt-get install ruby-full 
# sudo apt-get update -y 
# sudo apt-get install -y ruby-sinatra

require 'sinatra'

get '/' do

	erb :index

end

post '/reverse' do

	@first_name = params[:first_name]

	@last_name = params[:last_name]

	@reversed_name = "#{@last_name} #{@first_name}"

	erb :reverse

end