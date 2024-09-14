APP = livrocaixa

compose:
	@docker compose build
	@docker compose up

teardown:
	@docker compose down
	@docker system prune

clean:
	@docker system prune -a --volumes --force

heroku:
	@heroku container:login
	@heroku container:push -a $(APP) web
	@heroku container:release -a $(APP) web